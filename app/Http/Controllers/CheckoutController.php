<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showShipping()
    {
        $cartItems = CartItem::with('product')
            ->where('cart_id', Auth::id())
            ->get();

        return view('checkout.shipping', compact('cartItems'));
    }

    // Tampilkan halaman shipping
    public function storeShipping(Request $request)
    {
        $request->validate([
            'shipping_method' => 'required|string',
        ]);

        $shippingOptions = [
            'anteraja' => 35000,
            'sicepat' => 40000,
            'lionparcel' => 30000,
        ];

        $shippingMethod = $request->shipping_method;
        $shippingCost = $shippingOptions[$shippingMethod] ?? 0;

        // Simpan ke session
        session([
            'shipping_method' => $shippingMethod,
            'shipping_cost' => $shippingCost
        ]);

        return redirect()->route('checkout.payment'); // route GET
    }


    // Tampilkan halaman payment
    public function showPayment()
    {
        $cartItems = CartItem::with('product')
            ->where('cart_id', Auth::id())
            ->get();

        $shippingMethod = session('shipping_method');
        $shippingCost = session('shipping_cost') ?? 0;

        $subtotalProduct = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $total = $subtotalProduct + $shippingCost;

        return view('checkout.payment', compact(
            'cartItems',
            'shippingMethod',
            'shippingCost',
            'subtotalProduct',
            'total'
        ));
    }
    public function payment(Request $request)
    {
        $user = auth()->user();

        // Ambil item keranjang dengan lock untuk mencegah race condition
        $cartItems = CartItem::with(['product' => function ($query) {
            $query->lockForUpdate();
        }])->where('cart_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong');
        }

        DB::beginTransaction();

        try {
            // Hitung subtotal
            $subtotal = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $shippingCost = session('shipping_cost', 0);
            $total = $subtotal + $shippingCost;

            // Simpan transaksi
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->payment_method = $request->payment_method;
            $transaction->subtotal = $subtotal;
            $transaction->shipping_cost = $shippingCost;
            $transaction->total = $total;
            $transaction->expedition = session('shipping_method');
            $transaction->status = 'processing';
            $transaction->save();

            // Kurangi stok produk satu per satu
            foreach ($cartItems as $item) {
                $updated = Product::where('id', $item->product_id)
                    ->where('stock', '>=', $item->quantity)
                    ->decrement('stock', $item->quantity);

                if (!$updated) {
                    throw new \Exception("Gagal mengurangi stok produk ID: {$item->product_id}");
                }

                \Log::info('Data transaksi yang disimpan:', [
                    'user_id' => $user->id,
                    'subtotal' => $subtotal,
                    'shipping_cost' => $shippingCost,
                    'total' => $total,
                ]);
            }

            // Hapus isi keranjang
            CartItem::where('user_id', $user->id)->delete();

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order Transactions Succes!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Pembayaran gagal: ' . $e->getMessage());
        }
    }
}

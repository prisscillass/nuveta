<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index() {
        // user
        $userId = Auth::user()->id;
        $transactions = Transaction::where('user_id', $userId)->get();
        // $transactionList = [];

        // // order list
        // if ($transaction) {
        //     $transactionList = TransactionItem::where('transaction_id', $transaction->id)->get();
        // }
        
        // return page
        return view('transaction.my-transaction', compact('transactions'));
    }


    public function checkout(Request $request) {
        $validated = $request->validate([
            'items' => 'required|array',
            'items.*.cart_id' => 'required|exists:carts,id',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.buyqty' => 'required|integer|min:1',
        ]);

        // menyimpan data item yang dicheckout ke dalam session karena akan berlanjut memilih ekspedisi
        session(['checkouted_items_session' => $validated['items']]);

        // dd($validated['items']);

        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();

        $checkoutedItems = CartItem::with('product')->where('cart_id', $cart->id)->get();

        // Ambil product_id dari items
        // $productIds = collect($validated['items'])->pluck('product_id')->all();

        // // Query semua produk yang sesuai
        // $checkoutedItems = CartItem::whereIn('id', $productIds)->get();
            
        return view('transaction.expedition-page', compact('checkoutedItems'));
    }

    public function checkoutExpedition(Request $request) {
        $validated = $request->validate([
            'expedition' => 'required|in:anteraja,sicepat,lionparcel',
        ]);

        $selectedExpedition = $validated['expedition'];
        // dd($selectedExpedition);

        // Bisa ambil harga dari mapping
        $shippingPrices = [
            'anteraja' => 35000,
            'sicepat' => 40000,
            'lionparcel' => 30000,
        ];

        $shippingCost = $shippingPrices[$selectedExpedition];

        // simpan shipping method dan shipping cost
        session([
            'expedition' => $selectedExpedition,
            'shipping_cost' => $shippingCost
        ]);

        $checkoutedItemsSession = session('checkouted_items_session');
        
        // hitung total dari barang di checkout
        $subtotal = 0;
        // dd($checkoutedItemsSession);
        foreach ($checkoutedItemsSession as $item) {
            $productId = $item['product_id'];
            $buyqty = $item['buyqty'];
            
            $product = Product::find($productId);

            if ($product) {
                $subtotal += $product->price * $buyqty;
            }
        }
        $total = $subtotal + $shippingCost;

        $shippingCost = session('shipping_cost');

        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();

        $checkoutedItems = CartItem::with('product')->where('cart_id', $cart->id)->get();

        return view('transaction.payment-page', compact('subtotal', 'total', 'shippingCost', 'checkoutedItems'));
    }

    public function checkoutPayment(Request $request) {
        $validated = $request->validate([
            'payment_method' => 'required|in:cod,bank_transfer',
            'bank' => 'required_if:payment_method,bank_transfer|in:bca,bri,mandiri',
        ]);

        // ambil semua data dari semua session
        $expedition = session('expedition');
        $shippingCost = session('shipping_cost');
        $checkoutedItems = session('checkouted_items_session');

        // hitung total dari barang di checkout
        $subtotal = 0;
        foreach ($checkoutedItems as $item) {
            $productId = $item['product_id'];
            $buyqty = $item['buyqty'];
            
            $product = Product::find($productId);

            if ($product) {
                $subtotal += $product->price * $buyqty;
            }
        }

        $total = $subtotal + $shippingCost;

        // simpan ke session
        session([
            'expedition' => $expedition,
            'shipping_cost' => $shippingCost,
            'subtotal' => $subtotal,
            'total' => $total
        ]);

        $userId = Auth::user()->id;

        $transaction = Transaction::create([
            'user_id' => $userId,
            'payment_method' => $validated['payment_method'],
            'total' => $total,
            'expedition' => $expedition,
            'status' => 'done',
        ]);

        // simpan ke transactionitem
        foreach ($checkoutedItems as $item) {
            $product = Product::find($item['product_id']);
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'product_id' => $item['product_id'],
                'transaction_quantity' => $item['buyqty']
            ]);

            // ngurangin stock product
            if ($product) {
                $product->stock -= $item['buyqty'];
                $product->save();
            }
        }

        // Hapus dari cari cart sma cartItem
        $cart = Cart::where('user_id', $userId)->first();
        foreach ($checkoutedItems as $item) {
            CartItem::where('cart_id', $cart->id)
                ->where('product_id', $item['product_id'])
                ->delete();
        }

        // Hapus session
        session()->forget(['expedition', 'shipping_cost', 'checkouted_items_session']);

        // return view('transaction.my-transaction', compact('subtotal', 'shippingCost', 'total'));
        return redirect()->route('transaction.index');
    }
}

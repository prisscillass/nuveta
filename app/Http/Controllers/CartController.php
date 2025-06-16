<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->first();
        $cartItems = [];

        if ($cart) {
            $cartItems = CartItem::where('cart_id', $cart->id)->get();
        }

        // return view('cart');
        return view('cart', compact('cartItems'));
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'buyqty' => 'required|integer|min:1'
        ]);

        $userId = Auth::user()->id;

        $cartIsExist = Cart::where('user_id', $userId)->first();

        // belum punya keranjang, maka dibuat keranjang nya lalu itemnya 
        // di masukan ke keranjang yang baru
        if (!$cartIsExist) {
            $createdCart = Cart::create([
                'user_id' => $userId,
            ]);

            $itemIsExist = CartItem::where('product_id', $product->id)->first();

            if (!$itemIsExist) {
                CartItem::create([
                    'cart_id' => $createdCart->id,
                    'product_id' => $product->id,
                    'cart_quantity' => $validated['buyqty']
                ]);
            }
        } else {
            $itemIsExist = CartItem::where('product_id', $product->id)->first();

            if (!$itemIsExist) {
                CartItem::create([
                    'cart_id' => $cartIsExist->id,
                    'product_id' => $product->id,
                    'cart_quantity' => $validated['buyqty']
                ]);
            }
        }

        return redirect()->route('home');
    }
    
    public function destroy(CartItem $cartItem)
    {
        $userId = Auth::user()->id;

        $cartIsExist = Cart::where('user_id', $userId);

        if ($cartIsExist) {
            $itemIsExist = CartItem::where('id', $cartItem->id)->first();
            if ($itemIsExist) {
                $itemIsExist->delete();

                return redirect()->route('cart.index');
            }
        }
    }
}

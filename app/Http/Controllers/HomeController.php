<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // query param
    public function index(Request $request) {
        if ($request->has('category')) {
            # code...
            $products = Product::where('category', 'like', '%' . request()->get('category', '') . '%')->get();

            return view('home-page', compact('products'));
        }

        // ngambil 5 baris data dengan field yang dipilih
        $products = Product::limit(5)->get();

        return view('home-page', compact('products'));
    }
}

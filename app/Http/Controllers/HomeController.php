<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        if (request()->has('category')) {
            # code...
            $products = Product::where('category', 'like', '%' . request()->get('category', '') . '%')->get();

            return view('home-page', compact('products'));
        }

        // ngambil 5 baris data dengan field yang dipilih
        $products = Product::select('img_url', 'category', 'name', 'price')->limit(5)->get();

        return view('home-page', compact('products'));
    }
}

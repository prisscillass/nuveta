<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show($id)
    {
        // Data statis produk
        $products = [
            1 => [
                'name' => 'Adidas Samba Pink',
                'description' => 'Sepatu klasik dengan desain elegan berwarna pink.',
                'price' => 1450000,
                'img_url' => 'samba-shoes.jpg',
                'stock' => 2,
                'brand' => 'Adidas',
                'size' => 'Euro 39 = 24.5 CM',
                'condition' => 'Bagus'
            ],
        ];

        // Cek apakah produk dengan ID yang diminta tersedia
        if (!isset($products[$id])) {
            return response()->view('errors.product-not-found', [], 404);
        }

        // Tampilkan halaman produk dengan data dari array
        return view('product/product-detail', ['product' => $products[$id]]);
    }
}

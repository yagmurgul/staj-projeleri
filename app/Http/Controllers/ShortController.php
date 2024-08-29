<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShortController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Tüm ürünleri alır
        return view('shop', compact('products')); // 'shop' blade dosyasına ürünleri gönderir
}
}

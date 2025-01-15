<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banners::all();
        $products = Product::with('category')->take(10)->get();
        $latestProducts = Product::with('category')->latest()->take(5)->get(); // Menampilkan 10 produk terbaru

        $categoryClasses = [
            1 => 'bg-red-500',
            2 => 'bg-blue-500',
            3 => 'bg-green-500',
        ];

        return view('home', compact('banners', 'products', 'latestProducts', 'categoryClasses'));
    }
}

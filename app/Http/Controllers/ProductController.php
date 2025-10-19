<?php

namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $products = Product::all();
            return view('welcome', ['products' => $products]);
        }

        /**
         * Menampilkan halaman detail untuk satu produk.
         */
        public function show(Product $product)
        {
            // Laravel akan secara otomatis menemukan produk dari database
            // berdasarkan ID di URL (misal: /products/1)
            // dan menyimpannya di variabel $product.
            // Kita lalu mengirimkan variabel $product itu ke view.
            return view('products.show', ['product' => $product]);
        }
    }
    


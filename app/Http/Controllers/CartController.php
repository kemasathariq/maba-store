<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', ['cart' => $cart]);
    }

    /**
     * Menambahkan produk ke keranjang belanja.
     */
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Jika belum ada, tambahkan produk baru ke keranjang
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image_url" => $product->image_url // Anda bisa menambahkan ini jika perlu
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }
}

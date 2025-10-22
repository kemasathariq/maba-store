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
     * Menambahkan produk ke keranjang belanja (sudah diupdate).
     */
    public function add(Request $request, Product $product)
    {
        // Ambil kuantitas dari form input, jika tidak ada, default-nya adalah 1
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Jika belum ada, tambahkan produk baru ke keranjang
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => $quantity, // Gunakan kuantitas dari input
                "price" => $product->price,
                "description" => $product->description,
                "image_url" => $product->image_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    /**
     * Menghapus produk dari keranjang belanja. (Method Baru)
     */
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            unset($cart[$product->id]); // Hapus item dari array cart
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully!');
    }
}


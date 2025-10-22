<?php

namespace App\Http\Controllers;

    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
            public function index(){
            $products = Product::all();

            // Daftar gambar sesuai urutan ID atau nama produk
            $images = [
                'Calculus I Textbook' => 'Kalkulus_1.svg',
                'Calculus II Textbook' => 'Kalkulus_2.svg',
                'Official Campus Belt' => 'Belt.svg',
                'Official Training Book' => 'Buku_Ospek.svg',
                'Formal Black Trousers' => 'Celana.svg',
                'University Tie' => 'Dasi.svg',
                'Physics: Mechanics Textbook' => 'Fismek.svg',
                'Plain White Shirt' => 'Kemeja.svg',
                'A3 Poster Paper' => 'KertasA3.png',
                'Red Ribbon for Nametag' => 'Pita.png',
            ];

            // Tambahkan properti "image" ke setiap produk.
            // Prioritaskan field `image` yang mungkin sudah disimpan di database
            foreach ($products as $product) {
                // jika kolom image di database diisi (dari upload), gunakan itu
                if (!empty($product->image)) {
                    continue;
                }

                // jika tidak ada, fallback ke mapping berdasarkan nama
                $name = $product->name;
                if (isset($images[$name])) {
                    $product->image = $images[$name];
                } else {
                    $product->image = 'default.svg'; // fallback kalau tidak ditemukan
                }
            }

            return view('welcome', ['products' => $products]);
        }


        /**
         * Menampilkan halaman detail untuk satu produk.
         */
        public function show(Product $product)
        {
            // Mapping nama produk ke nama file gambar
            $images = [
                'Calculus I Textbook' => 'Kalkulus_1.svg',
                'Calculus II Textbook' => 'Kalkulus_2.svg',
                'Official Campus Belt' => 'Belt.svg',
                'Official Training Book' => 'Buku_Ospek.svg',
                'Formal Black Trousers' => 'Celana.svg',
                'University Tie' => 'Dasi.svg',
                'Physics: Mechanics Textbook' => 'Fismek.svg',
                'Plain White Shirt' => 'Kemeja.svg',
                'A3 Poster Paper' => 'KertasA3.png',
                'Red Ribbon for Nametag' => 'Pita.png',
            ];
            $name = $product->name;
            if (isset($images[$name])) {
                $product->image = $images[$name];
            } else {
                $product->image = 'default.svg';
            }
            return view('products.show', ['product' => $product]);
        }
    }
    


<?php

namespace App\Http\Controllers;

    use App\Models\Order;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth; // Pastikan ini di-import

    class OrderController extends Controller
    {
        /**
         * Menyimpan pesanan baru ke database.
         */
        public function store(Request $request)
        {
            // 1. Ambil keranjang dari session
            $cart = session()->get('cart', []);

            // 2. Jika keranjang kosong, jangan lakukan apa-apa
            if (empty($cart)) {
                return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
            }

            // 3. Hitung total harga
            $totalPrice = 0;
            foreach ($cart as $id => $details) {
                $totalPrice += $details['price'] * $details['quantity'];
            }

            // 4. Buat record Order baru di tabel 'orders'
            $order = Order::create([
                'user_id' => Auth::id(), // ID pengguna yang sedang login
                'total' => $totalPrice,
                'status' => 'Pending', // Status awal pesanan
            ]);

            // 5. Lampirkan setiap produk dari keranjang ke pesanan
            //    menggunakan tabel pivot 'order_product'
            foreach ($cart as $id => $details) {
                $order->products()->attach($id, ['quantity' => $details['quantity']]);
            }

            // 6. Kosongkan keranjang di session
            session()->forget('cart');

            // 7. Arahkan kembali ke halaman keranjang dengan pesan sukses
            return redirect()->route('cart.index')->with('success', 'Order placed successfully!');
        }
    }
    

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;

class ProductPageTest extends TestCase
{
    use RefreshDatabase; // Otomatis me-reset database untuk setiap tes

    /**
     * Tes untuk memastikan halaman utama dapat diakses dan menampilkan produk.
     *
     * @return void
     */
    public function test_product_page_loads_successfully_and_shows_products(): void
    {
        // 1. Persiapan: Buat sebuah produk palsu di database
        $product = Product::create([
            'name' => 'Buku Kalkulus 1',
            'description' => 'Buku wajib untuk semester pertama.',
            'price' => 125000,
        ]);

        // 2. Aksi: Lakukan request GET ke halaman utama ('/')
        $response = $this->get('/');

        // 3. Penegasan (Assertion): Periksa hasilnya
        $response->assertStatus(200); // Pastikan halaman merespons dengan status OK
        $response->assertSee($product->name); // Pastikan nama produk yang kita buat muncul di halaman
        $response->assertSee('Our Products'); // Pastikan judul halaman muncul
    }
}

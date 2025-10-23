<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        // Menampilkan daftar semua produk (Read)
        public function index()
        {
            $products = Product::latest()->get();
            return view('admin.products.index', compact('products'));
        }

        // Menampilkan form untuk membuat produk baru (Create)
        public function create()
        {
            return view('admin.products.create');
        }

        // Menyimpan produk baru ke database
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0|max:99999999.99',
            ]);

            Product::create($request->all());

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        }

        // Menampilkan form untuk mengedit produk (Update)
        public function edit(Product $product)
        {
            return view('admin.products.edit', compact('product'));
        }

        // Memperbarui produk di database
        public function update(Request $request, Product $product)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'price' => 'required|numeric|min:0',
            ]);

            $product->update($request->all());

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        }

        // Menghapus produk dari database (Delete)
        public function destroy(Product $product)
        {
            $product->delete();
            return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
        }
    }
    


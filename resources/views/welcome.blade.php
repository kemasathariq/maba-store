{{-- Langkah 1: Gunakan Master Layout dari 'app.blade.php' --}}
<x-app-layout>
    
    {{-- Semua konten di dalam tag ini akan dimasukkan ke dalam '{{ $slot }}' di layout --}}
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">MABA STORE Essentials</h1>
        
        {{-- Langkah 2: Buat Grid untuk Produk --}}
        {{-- Kelas 'grid' dari Tailwind akan membuat layout kolom yang responsif --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            {{-- Langkah 3: Ulangi untuk setiap produk yang dikirim oleh Controller --}}
            @foreach ($products as $product)
            
                {{-- Langkah 4: Tampilkan Komponen Product Card untuk setiap produk --}}
                {{-- ':product="$product"' adalah cara kita mengirim data produk saat ini ke dalam komponen --}}
                <x-product-card :product="$product" />
                
            @endforeach
        </div>
    </div>

</x-app-layout>


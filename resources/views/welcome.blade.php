<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Banner --}}
        <img src="{{ asset('images/banner.svg') }}" alt="Maba Store Banner" class="w-full mb-8 rounded-lg shadow-md">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">MABA STORE Essentials</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</x-app-layout>

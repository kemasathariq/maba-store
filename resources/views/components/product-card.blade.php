@props(['product'])

<a href="{{ route('products.show', $product->id) }}" class="block group">
    <div class="bg-white rounded-lg shadow-md overflow-hidden transform group-hover:-translate-y-1 transition-transform duration-300 flex flex-col h-full">
        <img src="https://placehold.co/600x400/E2E8F0/333333?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
        <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold text-gray-800 truncate">{{ $product->name }}</h3>
            <p class="text-gray-500 mt-1 text-sm flex-grow">{{ $product->description }}</p>
            <div class="mt-4 flex items-center justify-between">
                <span class="text-xl font-bold text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                <span class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                    View Details
                </span>
            </div>
        </div>
    </div>
</a>
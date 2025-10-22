<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-xl overflow-hidden md:flex">
            <div class="md:w-1/2">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>

            <div class="p-8 md:w-1/2 flex flex-col justify-center">
                <h1 class="text-4xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="mt-4 text-gray-600 text-lg">
                    {{ $product->description }}
                </p>

                <div class="mt-8">
                    <span class="text-3xl font-bold text-gray-900">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-8">
                    @csrf
                    <div class="flex items-center mb-4">
                        <label for="quantity" class="mr-4 font-semibold text-gray-700">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-20 rounded border-gray-300 text-center">
                    </div>
                    <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-indigo-700 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
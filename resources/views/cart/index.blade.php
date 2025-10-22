<x-app-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Your Shopping Cart</h1>

        {{-- Menampilkan pesan sukses setelah menambahkan produk --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(!empty($cart))
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="font-semibold text-gray-600 p-4">Product</th>
                            <th class="font-semibold text-gray-600 p-4">Quantity</th>
                            <th class="font-semibold text-gray-600 p-4 text-right">Price</th>
                            <th class="font-semibold text-gray-600 p-4 text-right">Subtotal</th>
                            <th class="font-semibold text-gray-600 p-4"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <tr class="border-b">
                                <td class="p-4 font-medium text-gray-800">{{ $details['name'] }}</td>
                                <td class="p-4 text-center">{{ $details['quantity'] }}</td>
                                <td class="p-4 text-right">Rp{{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td class="p-4 text-right">Rp{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                                <td class="p-4 text-center">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-semibold">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-6 text-right">
                    <p class="text-2xl font-bold">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
                    <button class="mt-4 bg-green-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-green-700">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
        @else
            <div class="text-center bg-white shadow-md rounded-lg p-12">
                <p class="text-xl text-gray-600">Your cart is empty.</p>
                <a href="/" class="mt-6 inline-block bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700">
                    Continue Shopping
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
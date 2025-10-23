<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Customer
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Details
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        #{{ $order->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $order->user->name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        Rp{{ number_format($order->total, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                               ($order->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $order->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <button onclick="toggleOrderDetails({{ $order->id }})" class="text-indigo-600 hover:text-indigo-900">
                                            View Details
                                        </button>
                                    </td>
                                </tr>
                                <!-- Order Details Row -->
                                <tr id="order-details-{{ $order->id }}" class="hidden bg-gray-50">
                                    <td colspan="6" class="px-6 py-4">
                                        <div class="space-y-4">
                                            <h4 class="font-medium text-gray-900">Order Items:</h4>
                                            <div class="border rounded-lg overflow-hidden">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class="bg-gray-100">
                                                        <tr>
                                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Product</th>
                                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Quantity</th>
                                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Price</th>
                                                            <th class="px-4 py-2 text-right text-xs font-medium text-gray-500">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="divide-y divide-gray-200">
                                                        @foreach ($order->products as $product)
                                                            <tr>
                                                                <td class="px-4 py-2 text-sm">{{ $product->name }}</td>
                                                                <td class="px-4 py-2 text-sm">{{ $product->pivot->quantity }}</td>
                                                                <td class="px-4 py-2 text-sm text-right">
                                                                    Rp{{ number_format($product->price, 0, ',', '.') }}
                                                                </td>
                                                                <td class="px-4 py-2 text-sm text-right">
                                                                    Rp{{ number_format($product->price * $product->pivot->quantity, 0, ',', '.') }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        No orders found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for toggling order details -->
    <script>
        function toggleOrderDetails(orderId) {
            const detailsRow = document.getElementById(`order-details-${orderId}`);
            detailsRow.classList.toggle('hidden');
        }
    </script>
</x-admin-layout>

<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Quick Links</h3>
                    <div class="space-y-4">
                        <a href="{{ route('admin.products.index') }}" class="block p-4 bg-gray-50 hover:bg-gray-100 rounded-lg">
                            <div class="font-medium">Manage Products</div>
                            <div class="text-sm text-gray-500">Add, edit, or remove products</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
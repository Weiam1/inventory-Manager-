<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow rounded p-4">
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover rounded mb-2" alt="{{ $product->name }}">
                        <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                        <p class="text-gray-600">{{ $product->price }} €</p>
                        <p class="text-sm text-gray-500 mt-1">{{ Str::limit($product->description, 100) }}</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button class="mt-3 bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">
        Add to Cart
    </button>
</form>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
        @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="mb-6">
    <form method="GET" action="{{ route('shop') }}" class="flex flex-col md:flex-row md:items-center md:space-x-4">
        <div class="flex-grow">
            <input type="text" name="search" placeholder="Search product..."
                   value="{{ request('search') }}"
                   class="w-full border rounded px-3 py-2 shadow-sm focus:outline-none">
        </div>

<div class="mb-6">
    <form method="GET" action="{{ route('shop') }}">
        <label for="category" class="block mb-1 font-semibold">Filter by Category:</label>
        <select name="category" id="category" onchange="this.form.submit()" class="w-1/2 border rounded px-3 py-2">
            <option value=""> All </option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow rounded p-4">
@if($product->image)
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-32 h-32 object-cover">
@else
    <div class="w-32 h-32 bg-gray-100 flex items-center justify-center text-gray-400 text-sm">
        No image
    </div>
@endif
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

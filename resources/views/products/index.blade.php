<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                {{-- ✅ كل الكود الموجود حالياً داخل div هذا --}}
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Product List</h1>

                    <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="search" class="border rounded px-2 py-1" placeholder="Search..." value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Search</button>
                    </form>
                </div>

                <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 inline-block mb-4">Add New Product</a>

                @if(session('success'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-auto">
                    <table class="min-w-full text-left border">
                        <thead class="bg-gray-100 text-gray-800">
                            <tr>
                                <th class="px-4 py-2 border">ID</th>
                                <th class="px-4 py-2 border">Image</th>
                                <th class="px-4 py-2 border">Name</th>
                                <th class="px-4 py-2 border">Description</th>
                                <th class="px-4 py-2 border">Price</th>
                                <th class="px-4 py-2 border">Quantity</th>
                                <th class="px-4 py-2 border">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $product->id }}</td>
                                    <td class="px-4 py-2 border">
                                        @if ($product->image)
                                            <img src="{{ asset('images/' . $product->image) }}" width="60" height="60" class="rounded object-cover">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">{{ $product->name }}</td>
                                    <td class="px-4 py-2 border">{{ $product->description }}</td>
                                    <td class="px-4 py-2 border">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-4 py-2 border">{{ $product->quantity }}</td>
                                    <td class="px-4 py-2 border flex gap-2">
                                        <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

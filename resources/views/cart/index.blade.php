<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Your Cart') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold">
                    {{ session('success') }}
                </div>
            @endif

            @if(count($cart) > 0)
                <table class="min-w-full bg-white shadow rounded">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b text-left">Product</th>
                            <th class="px-6 py-3 border-b text-left">Quantity</th>
                            <th class="px-6 py-3 border-b text-left">Price</th>
                            <th class="px-6 py-3 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                            <tr>
                                <td class="px-6 py-4 border-b">
                                    <strong>{{ $item['name'] }}</strong>
                                </td>
                                <td class="px-6 py-4 border-b">{{ $item['quantity'] }}</td>
                                <td class="px-6 py-4 border-b">{{ $item['price'] }} €</td>
                                <td class="px-6 py-4 border-b">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(session('cart') && count(session('cart')) > 0)
    <div class="mt-4 text-right">
        <a href="{{ route('checkout') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Proceed to Checkout
        </a>
    </div>
@endif


            @else
                <p class="text-gray-600">Your cart is empty.</p>
            @endif
        </div>
    </div>
</x-app-layout>

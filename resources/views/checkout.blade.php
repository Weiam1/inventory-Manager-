<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded p-6">
                @if(session('cart') && count(session('cart')) > 0)
                    <table class="w-full mb-4">
                        <thead>
                            <tr>
                                <th class="text-left">Product</th>
                                <th class="text-left">Price</th>
                                <th class="text-left">Quantity</th>
                                <th class="text-left">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $id => $item)
                                @php
                                    $subtotal = $item['price'] * $item['quantity'];
                                    $total += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['price'] }} €</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($subtotal, 2) }} €</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-right font-bold text-lg mb-4">
                        Total: {{ number_format($total, 2) }} €
                    </div>

                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Confirm Order
                        </button>
                    </form>
                @else
                    <p>Your cart is empty.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

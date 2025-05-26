<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse($orders as $order)
                <div class="bg-white shadow rounded mb-6 p-4">
                    <h3 class="text-lg font-bold mb-2">Order #{{ $order->id }} – {{ $order->created_at->format('d M Y') }}</h3>
                    <table class="w-full text-sm mb-2">
                        <thead class="border-b font-semibold text-gray-700">
                            <tr>
                                <th class="text-left py-2">Product</th>
                                <th class="text-left py-2">Quantity</th>
                                <th class="text-left py-2">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                                <tr class="border-b">
                                    <td class="py-1">{{ $item->product->name ?? 'N/A' }}</td>
                                    <td class="py-1">{{ $item->quantity }}</td>
                                    <td class="py-1">{{ number_format($item->price, 2) }} €</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right font-bold text-gray-800">Total: {{ number_format($order->total, 2) }} €</div>
                </div>
            @empty
                <p class="text-gray-600">You have no orders yet.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>

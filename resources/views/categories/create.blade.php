<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Add Category') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto">
        <form action="{{ route('categories.store') }}" method="POST" class="bg-white p-6 shadow rounded">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold">Category Name:</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Create</button>
        </form>
    </div>
</x-app-layout>

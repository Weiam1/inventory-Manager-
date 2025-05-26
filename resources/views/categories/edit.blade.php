<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-xl mx-auto">
        <form action="{{ route('categories.update', $category) }}" method="POST" class="bg-white p-6 shadow rounded">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-semibold">Category Name:</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" value="{{ $category->name }}" required>
                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </form>
    </div>
</x-app-layout>

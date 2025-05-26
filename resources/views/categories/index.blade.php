<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto">
        <a href="{{ route('categories.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</a>

        @if(session('success'))
            <div class="mb-4 text-green-600 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="border-b px-4 py-2 text-left">Name</th>
                    <th class="border-b px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $category->name }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('categories.edit', $category) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

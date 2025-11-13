@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Kategori</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST"
            class="bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" required
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block font-semibold text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('categories.index') }}"
                    class="px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">Batal</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
@endsection

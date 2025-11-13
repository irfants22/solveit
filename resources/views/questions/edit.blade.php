@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Pertanyaan</h1>

    <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" value="{{ old('title', $question->title) }}"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Isi Pertanyaan</label>
            <textarea id="edit-editor" name="body" rows="5"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">{{ old('content', $question->body) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="category_id"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $question->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @if ($question->image)
            <div>
                <p class="text-sm text-gray-500">Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $question->image) }}" alt="Gambar pertanyaan" class="w-48 rounded mt-2">
            </div>
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" class="mt-1">
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Perbarui</button>
    </form>
@endsection

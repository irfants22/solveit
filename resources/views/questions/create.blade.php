@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Buat Pertanyaan Baru</h1>

    <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700">Judul Pertanyaan</label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Isi Pertanyaan</label>
            <textarea name="body" rows="5"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">{{ old('body') }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <select name="category_id"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Unggah Gambar (Opsional)</label>
            <input type="file" name="image" id="imageUpload" class="mt-1">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Kirim
            Pertanyaan</button>
    </form>

    <script>
        // Register plugin
        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageResize,
            FilePondPluginFileValidateType
        );

        // Buat instance
        const pond = FilePond.create(document.querySelector('#imageUpload'), {
            acceptedFileTypes: ['image/png', 'image/jpeg'],
            imageResizeTargetWidth: 800,
            imageResizeMode: 'contain',
            storeAsFile: true,
            labelIdle: 'Seret & lepaskan gambar atau <span class="filepond--label-action">Pilih</span>',
        });
    </script>
@endsection

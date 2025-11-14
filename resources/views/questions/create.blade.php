@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Buat Pertanyaan Baru</h1>
        </div>

        <form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow-lg rounded-xl p-8 space-y-6 border border-gray-100">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">
                    Judul Pertanyaan
                    <span class="text-red-500">*</span>
                </label>
                <input type="text" name="title" value="{{ old('title') }}"
                    placeholder="Tulis judul pertanyaan yang jelas dan spesifik"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400">
                @error('title')
                    <p class="text-red-600 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">
                    Isi Pertanyaan
                    <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <textarea id="create-editor" name="body" rows="5" placeholder="Jelaskan pertanyaan Anda secara detail..."
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 placeholder-gray-400 resize-y">{{ old('body') }}</textarea>
                </div>
                @error('body')
                    <p class="text-red-600 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">
                    Kategori
                    <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <select name="category_id"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg mt-1 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 appearance-none bg-white cursor-pointer">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-800 mb-2">
                    Unggah Gambar
                    <span class="text-gray-500 font-normal">(Opsional)</span>
                </label>
                <div class="mt-1">
                    <input type="file" name="image" id="imageUpload" class="mt-1">
                </div>
                @error('image')
                    <p class="text-red-600 text-sm mt-2 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="pt-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-600">
                        <span class="text-red-500">*</span> Wajib diisi
                    </p>
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-200 transform hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                        Kirim Pertanyaan
                    </button>
                </div>
            </div>
        </form>
    </div>

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

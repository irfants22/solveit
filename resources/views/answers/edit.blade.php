@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Jawaban</h1>

    <form action="{{ route('answers.update', $answer->id) }}" method="POST"
        class="bg-white shadow-md rounded-lg p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                Pertanyaan
            </label>
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                <p class="text-gray-800 font-medium">{{ $answer->question->title }}</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Isi Jawaban
            </label>
            <textarea name="body" rows="6" placeholder="Tulis jawaban Anda secara lengkap dan jelas..."
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 resize-y">{{ old('body', $answer->body) }}</textarea>
            @error('body')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-2">
            <a href="{{ route('questions.show', $answer->question->id) }}"
                class="flex-1 text-center bg-white text-gray-700 font-medium px-4 py-2.5 rounded-lg border border-gray-300 hover:bg-gray-50 transition duration-150">
                Batal
            </a>

            <button type="submit"
                class="flex-1 bg-indigo-600 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-indigo-700 transition duration-150">
                Perbarui Jawaban
            </button>
        </div>
    </form>
@endsection

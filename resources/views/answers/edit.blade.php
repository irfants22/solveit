@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Jawaban</h1>

    <form action="{{ route('answers.update', $answer->id) }}" method="POST"
        class="bg-white shadow-md rounded-lg p-6 space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Pertanyaan</label>
            <p class="text-gray-800 font-semibold">{{ $answer->question->title }}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Isi Jawaban</label>
            <textarea name="body" rows="5"
                class="w-full border-gray-300 rounded-md mt-1 focus:ring-indigo-500 focus:border-indigo-500">{{ old('body', $answer->body) }}</textarea>
            @error('body')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Perbarui
            Jawaban</button>
    </form>
@endsection

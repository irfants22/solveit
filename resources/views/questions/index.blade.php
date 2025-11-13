@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Pertanyaan</h1>
        @auth
            <a href="{{ route('questions.create') }}"
                class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-white font-medium transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Buat
                Pertanyaan</a>
        @endauth
    </div>

    {{-- Question Card --}}
    <x-question-card :questions="$questions" />
@endsection

@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Profil Saya</h1>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-600">Nama</label>
                <p class="mt-1 text-gray-800">{{ Auth::user()->name }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Email</label>
                <p class="mt-1 text-gray-800">{{ Auth::user()->email }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Biodata</label>
                <p class="mt-1 text-gray-800">{{ Auth::user()->biodata ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Umur</label>
                <p class="mt-1 text-gray-800">{{ Auth::user()->age ?? '-' }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-600">Alamat</label>
                <p class="mt-1 text-gray-800">{{ Auth::user()->address ?? '-' }}</p>
            </div>


            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('profile.edit') }}"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    Edit Profil
                </a>
            </div>
        </div>
    </div>
@endsection

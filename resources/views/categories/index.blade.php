@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Kategori</h1>
            <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                + Tambah Kategori
            </a>
        </div>

        {{-- Tabel daftar kategori --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left border-collapse">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">#</th>
                        <th class="px-4 py-2 border-b">Nama Kategori</th>
                        <th class="px-4 py-2 border-b">Deskripsi</th>
                        <th class="px-4 py-2 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b font-medium">{{ $category->name }}</td>
                            <td class="px-4 py-2 border-b">{{ $category->description ?? '-' }}</td>
                            <td class="px-4 py-2 border-b text-center space-x-2">
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    class="inline delete-category-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            const deleteForms = document.querySelectorAll('.delete-category-form');

            deleteForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Hapus kategori ini?',
                        text: "Tindakan ini tidak dapat dibatalkan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

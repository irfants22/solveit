@props(['questions'])

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
    @forelse($questions as $question)
        <div
            class="bg-white shadow-lg rounded-xl p-4 hover:shadow-xl transition-shadow duration-300 border border-gray-100">
            <!-- Category Badge -->
            <div
                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-50 text-indigo-600 border border-indigo-100">
                {{ $question->category->name ?? 'Umum' }}
            </div>

            <!-- Header Card -->
            <div class="mt-4">
                <h2 class="text-xl font-bold mb-2 line-clamp-2">
                    <a href="{{ route('questions.show', $question->id) }}"
                        class="text-gray-800 hover:text-indigo-600 transition-colors duration-200">
                        {{ $question->title }}
                    </a>
                </h2>
            </div>

            <!-- Body Preview -->
            <p class="text-gray-600 mb-4 line-clamp-3 leading-relaxed">
                {{ Str::limit($question->body, 150) }}
            </p>

            <!-- Divider -->
            <hr class="mb-4 border-gray-200">

            <!-- Footer -->
            <div class="flex items-center justify-between">
                <!-- User Info -->
                <div class="flex items-center space-x-2 text-sm text-gray-500">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span class="font-medium text-gray-700">{{ $question->user->name }}</span>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <!-- View Details Button -->
                    <a href="{{ route('questions.show', $question->id) }}"
                        class="inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm font-medium text-gray-600 bg-gray-50 hover:bg-gray-100 transition-colors duration-200"
                        title="Lihat Detail">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                    </a>

                    <!-- Comment Button -->
                    <button
                        class="inline-flex items-center justify-center px-3 py-2 rounded-lg text-sm font-medium text-gray-600 bg-gray-50 hover:bg-gray-100 transition-colors duration-200"
                        title="Tambah Komentar">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Timestamp -->
            <div class="mt-3 pt-3 border-t border-gray-100">
                <p class="text-xs text-gray-400 flex items-center">
                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    {{ $question->created_at->diffForHumans() }}
                </p>
            </div>
        </div>
    @empty
        <div class="col-span-full">
            <div class="bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-12 text-center">
                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Pertanyaan</h3>
                <p class="text-gray-500 mb-4">Jadilah yang pertama untuk bertanya!</p>
                <a href="{{ route('questions.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Buat Pertanyaan
                </a>
            </div>
        </div>
    @endforelse
</div>

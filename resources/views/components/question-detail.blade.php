@props(['question'])

<div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
    <!-- Header Section -->
    <div class="p-6 bg-linear-to-r from-indigo-50 to-purple-50 border-b border-gray-200">
        <h1 class="text-3xl font-bold text-gray-800 mb-3 leading-tight">
            {{ $question->title }}
        </h1>

        <!-- Meta Info -->
        <div class="flex flex-wrap items-center gap-4 text-sm">
            <!-- Category Badge -->
            <div
                class="inline-flex items-center px-3 py-1.5 rounded-full bg-indigo-100 text-indigo-700 font-medium border border-indigo-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                    </path>
                </svg>
                {{ $question->category->name ?? 'Umum' }}
            </div>

            <!-- Author Info -->
            <div class="flex items-center text-gray-600">
                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="font-medium text-gray-700">{{ $question->user->name }}</span>
            </div>

            <!-- Timestamp -->
            <div class="flex items-center text-gray-500">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                {{ $question->created_at->diffForHumans() }}
            </div>
        </div>
    </div>

    <!-- Body Content -->
    <div class="p-6">
        <!-- Action Buttons for Question Owner -->
        @auth
            @if (Auth::id() === $question->user_id)
                <div class="mb-6 pb-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('questions.edit', $question->id) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            Edit Pertanyaan
                        </a>

                        <form id="delete-question-form" action="{{ route('questions.destroy', $question->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>
                                Hapus Pertanyaan
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        @endauth

        <div class="prose max-w-none mb-6">
            <p class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                {{ $question->body }}
            </p>
        </div>

        <!-- Image Section -->
        @if ($question->image)
            <div class="mt-6 mb-4">
                <div class="relative rounded-xl overflow-hidden shadow-md border border-gray-200 bg-gray-50">
                    <img src="{{ asset('storage/' . str_replace('\\', '/', $question->image)) }}"
                        alt="Gambar untuk {{ $question->title }}"
                        class="w-full h-auto object-contain max-h-[600px] mx-auto" loading="lazy">

                    <!-- Image Caption -->
                    <div class="absolute bottom-0 left-0 right-0 bg-linear-to-t from-black/50 to-transparent p-4">
                        <p class="text-white text-sm font-medium">
                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            Gambar pendukung pertanyaan
                        </p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <!-- Footer Stats (Optional) -->
    <div class="px-6 pb-6">
        <div class="flex items-center gap-6 pt-4 border-t border-gray-200">
            <!-- Views Count -->
            <div class="flex items-center text-gray-500 text-sm">
                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                    </path>
                </svg>
                <span class="font-medium">{{ $question->views_count ?? 0 }} views</span>
            </div>

            <!-- Comments Count -->
            <div class="flex items-center text-gray-500 text-sm">
                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                    </path>
                </svg>
                <span class="font-medium">{{ $question->comments_count ?? 0 }} komentar</span>
            </div>

            <!-- Answers Count (jika ada) -->
            @if (isset($question->answers_count))
                <div class="flex items-center text-gray-500 text-sm">
                    <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span class="font-medium">{{ $question->answers_count }} jawaban</span>
                </div>
            @endif
        </div>
    </div>
</div>

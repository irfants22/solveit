@extends('layouts.app')

@section('content')
    {{-- Question Detail --}}
    <x-question-detail :question="$question" />

    {{-- Answers Section --}}
    <x-answers-section :question="$question" />

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {

            const deleteForm = document.getElementById('delete-question-form');
            if (deleteForm) {
                deleteForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Hapus pertanyaan ini?',
                        text: "Tindakan ini tidak dapat dibatalkan.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            deleteForm.submit();
                        }
                    });
                });
            }

            const deleteAnswerForms = document.querySelectorAll('.delete-answer-form');
            deleteAnswerForms.forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Hapus jawaban ini?',
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

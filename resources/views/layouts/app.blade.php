<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolveIt</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- ===== FilePond CSS & JS (CDN) ===== --}}
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
        rel="stylesheet" />
    {{-- Plugin JS diletakkan sebelum filepond.min.js --}}
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js">
    </script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- Navbar --}}
    <x-navbar></x-navbar>

    {{-- Main content --}}
    <main class="flex-1 container mx-auto px-6 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-indigo-600 text-white text-center py-4 mt-10">
        <p>&copy; {{ date('Y') }} SolveIt. All rights reserved.</p>
    </footer>

    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <script>
        function initEditor(selector) {
            const el = document.querySelector(selector);
            if (!el) return;

            ClassicEditor.create(el, {
                    toolbar: [
                        'undo', 'redo', '|',
                        'heading', '|',
                        'bold', 'italic', 'blockQuote', 'link', '|',
                        'bulletedList', 'numberedList'
                    ]
                })
                .then(editor => console.log(`CKEditor aktif di ${selector}`))
                .catch(error => console.error('CKEditor gagal:', error));
        }

        document.addEventListener('DOMContentLoaded', () => {
            initEditor('#create-editor');
            initEditor('#edit-editor');
        });

        document.addEventListener('boost:load', () => {
            initEditor('#create-editor');
            initEditor('#edit-editor');
        });
    </script>


    @if (session('success'))
        <script type="module">
            document.addEventListener('DOMContentLoaded', function() {
                if (window.Swal) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
                } else {
                    console.error('SweetAlert2 tidak ditemukan!');
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script type="module">
            document.addEventListener('DOMContentLoaded', function() {
                if (window.Swal) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: "{{ session('success') }}",
                        showConfirmButton: true,
                    });
                } else {
                    console.error('SweetAlert2 tidak ditemukan!');
                }
            });
        </script>
    @endif

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            const logoutForm = document.getElementById('logout-form');

            if (logoutForm) {
                logoutForm.addEventListener('submit', function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: 'Yakin ingin logout?',
                        text: "Anda akan keluar dari sesi ini.",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, logout!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            logoutForm.submit();
                        }
                    });
                });
            }
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const postForm = document.getElementById('postForm');
                const postList = document.getElementById('postList');
                const toastSuccess = document.getElementById('toast-success');
                const toastError = document.getElementById('toast-error');
                const toast = document.getElementById('toast');
    
                setTimeout(() => {
                    if (toast) {
                        toast.classList.add('hidden');
                    }
                }, 1500);
    
                function showToast(toast) {
                    toast.classList.remove('hidden');
                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 3000);
                }
    
                postForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
    
                    const formData = new FormData(postForm);
    
                    const response = await fetch('{{ route('tambah_postingan') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: formData
                    });
    
                    if (response.ok) {
                        const result = await response.json();
                        const newPost = document.createElement('li');
                        newPost.classList.add('py-4');
                        newPost.setAttribute('data-id', result.id);
                        newPost.innerHTML = `
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="font-bold text-xl text-gray-900">${result.title}</h4>
                                    <p class="text-gray-700 py-2">${result.content}</p>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200 delete-post" data-id="${result.id}">Delete</button>
                                </div>
                            </div>
                        `;
                        postList.appendChild(newPost);
                        postForm.reset();
                        showToast(toastSuccess);
                    } else {
                        showToast(toastError);
                    }
                });
    
                postList.addEventListener('click', async function(e) {
                    if (e.target.classList.contains('delete-post')) {
                        const postId = e.target.getAttribute('data-id');
                        const response = await fetch(`/posts/${postId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        });
    
                        if (response.ok) {
                            e.target.closest('li').remove();
                            showToast(toastSuccess);
                        } else {
                            showToast(toastError);
                        }
                    }
                });
            });
        </script>

    
    </body>
</html>

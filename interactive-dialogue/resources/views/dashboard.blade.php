<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#222C67] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    @if(session()->has('success'))
    <div id="toast" role="alert" class="fixed top-5 right-14 rounded-xl border border-gray-100 bg-white p-4 shadow-xl dark:bg-gray-900 transition duration-700" x-show="show_notification" x-transition:leave.end="transform -translate-y-full opacity-0" x-cloak>
        <div class="flex items-start gap-4">
            <span class="text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>

            <div class="flex-1">
                <strong class="block font-medium text-gray-900 dark:text-white">
                   {{ session()->get('success')}}
                </strong>

                <p class="mt-1 text-sm text-gray-700 dark:text-gray-200">
                    {{ Auth::user()-> name }}
                </p>
            </div>

            <button class="text-gray-500 transition hover:text-gray-600 dark:text-gray-400 dark:hover:text-gray-500" @click="show_notification = false">
                <span class="sr-only">Dismiss popup</span>
                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <div id="toast-success" class="hidden fixed top-5 right-14 rounded-xl border border-gray-100 bg-green-500 text-white p-4 shadow-xl transition duration-700">
        <div class="flex items-start gap-4">
            <span class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </span>
            <div class="flex-1">
                <strong class="block font-medium">Success</strong>
                <p class="mt-1 text-sm">Operation completed successfully.</p>
            </div>
            <button class="text-white" onclick="document.getElementById('toast-success').classList.add('hidden')">
                <span class="sr-only">Dismiss</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div id="toast-error" class="hidden fixed top-5 right-14 rounded-xl border border-gray-100 bg-red-500 text-white p-4 shadow-xl transition duration-700">
        <div class="flex items-start gap-4">
            <span class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
            <div class="flex-1">
                <strong class="block font-medium">Error</strong>
                <p class="mt-1 text-sm">There was an error processing your request.</p>
            </div>
            <button class="text-white" onclick="document.getElementById('toast-error').classList.add('hidden')">
                <span class="sr-only">Dismiss</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div class="py-10 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4 text-[#222C67]">Tambahkan Sebuah Postingan!</h3>
                    <form id="postForm" class="space-y-6 bg-white p-4 rounded shadow">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200">
                        </div>
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition duration-200"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">Submit</button>
                        </div>
                    </form>
                    <div class="mt-10">
                        <h3 class="text-lg font-bold mb-4 text-[#222C67]">Daftar Postingan : </h3>
                        <ul id="postList" class="divide-y divide-gray-200 bg-white p-4 rounded shadow">
                            @foreach($posts as $post)
                                <li class="py-4" data-id="{{ $post->id }}">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h4 class="font-bold text-xl text-gray-900">{{ $post->title }}</h4>
                                            <p class="text-gray-700 py-2">{{ $post->content }}</p>
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-200 delete-post" 
                                            data-id="{{ $post->id }}">Delete</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

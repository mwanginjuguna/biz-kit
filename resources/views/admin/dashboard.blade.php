<?php
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-slate-50 dark:bg-slate-900 dark:text-skate-100">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mx-auto mt-6 lg:mt-10 px-4">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 lg:gap-8">
                    <div class="p-3 bg-gradient-to-tr from-orange-500 to-violet-500 text-gray-50 rounded-lg">
                        <p class="w-fit text-sm text-black font-semibold">
                            Subscribers
                        </p>
                        <p class="mt-3 text-center text-3xl md:text-5xl font-bold">
                            {{ 'N/A' }}
                        </p>
                    </div>

                    <div class="p-3 bg-gradient-to-tr from-lime-500 to-violet-500 text-gray-50 rounded-lg">
                        <p class="w-fit text-sm text-black font-semibold">
                            Contacts
                        </p>
                        <p class="mt-3 text-center text-3xl md:text-5xl font-bold">
                            {{ 'N/A' }}
                        </p>
                    </div>

                    <div class="p-3 bg-gradient-to-b from-orange-500 to-gray-600 text-gray-50 rounded-lg">
                        <p class="w-fit text-sm text-black font-semibold">
                            Published Posts
                        </p>
                        <p class="mt-3 text-center text-3xl md:text-5xl font-bold">
                            {{ $published }}
                        </p>
                    </div>

                    <div class="p-3 bg-gradient-to-b from-orange-500 to-gray-600 text-gray-50 rounded-lg">
                        <p class="w-fit text-sm text-black font-semibold">
                            All Posts
                        </p>
                        <p class="mt-3 text-center text-3xl md:text-5xl font-bold">
                            {{ $posts->count() }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="container mx-auto mt-6 lg:mt-10 p-6 grid text-slate-900 dark:text-slate-100 gap-6">
                <div class="mt-10 py-12 px-4 bg-slate-100 dark:bg-slate-800 rounded-lg">
                    <h2 class="py-2 font-bold text-3xl text-creator-primary ">
                        Latest Posts
                    </h2>

                    <div class="flex flex-col">
                        @foreach($posts->limit(5) as $post)
                            <div class="flex justify-between py-2 border-t items-center">
                                <p class="font-medium text-slate-700 dark:text-slate-200">
                                    {{ $post->title }}
                                </p>
                                <p class="py-1">
                                    <x-text-link href="{{ route('post-view', $post->slug) }}">View</x-text-link>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

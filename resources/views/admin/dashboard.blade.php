<?php
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-slate-50 dark:bg-slate-900 dark:text-skate-100 px-4">
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
                            {{ $publishedCount }}
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

            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2 max-w-3xl mt-6 lg:mt-10 grid text-slate-900 dark:text-slate-100 gap-6">
                    <div class="mt-10 py-12 px-4 bg-slate-100 dark:bg-slate-800 rounded-lg">
                        <h2 class="py-2 font-bold text-3xl text-creator-primary ">
                            Latest Posts
                        </h2>

                        <div class="flex flex-col divide-y">
                            @foreach($posts->take(5) as $post)
                                <div class="grid mt-3 py-2 items-center">
                                    <p class="w-max py-1 px-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-900 text-xs xl:text-sm">
                                        Views:
                                        <span class="pl-1.5 text-purple-500 font-medium"> {{ $post->views }}</span>
                                    </p>
                                    <a href="{{ route('post.show', $post->slug) }}"
                                       class="text-sm hover:underline underline-offset-4 text-slate-700 dark:text-slate-200 hover:text-orange-500 dark:hover:text-orange-500">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

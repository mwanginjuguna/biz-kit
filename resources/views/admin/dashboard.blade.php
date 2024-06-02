<?php
//dd($orders->count())
?>
<x-app-layout>
    <x-slot:title>
        Admin Dashboard
    </x-slot:title>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-300 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-slate-100 dark:bg-slate-900 dark:text-slate-200 px-4">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">

            <x-parts.dashboard-stats :users="$users" :$posts :$products :$orders />

            <div class="max-w-6xl mx-auto">
                <livewire:charts.sales :orders="$orders" :products="$products" :$topProducts :$purchasedProducts />
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="md:col-span-2 max-w-3xl mt-6 lg:mt-10 grid text-slate-900 dark:text-slate-100 gap-6">
                    <!--latest-posts -->
                    <div class="mt-10 py-12 px-4 bg-slate-100 dark:bg-slate-800 rounded-lg">
                        <h2 class="py-2 font-bold text-3xl text-creator-primary ">
                            Latest Posts
                        </h2>

                        <div class="flex flex-col">
                            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($posts->take(5) as $post)
                                    <li class="pb-3 sm:pb-4">
                                        <a href="{{ route( 'post.show', $post->slug) }}" class="flex items-center space-x-4 rtl:space-x-reverse">
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $post->title }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $post->category->name }}
                                                </p>
                                            </div>
                                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                {{ $post->views }}
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @pushonce('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpushonce
</x-app-layout>

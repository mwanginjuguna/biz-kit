<x-guest-layout>
    <x-slot:title>
        Blog - Informative, Educational and Entertaining News and Resources
    </x-slot:title>

    <div class="max-w-7xl mx-auto px-4 py-10 lg:py-20">
        <div id="blog" class="mt-4 pb-3 lg:pb-8">
            <h3 class="py-3 lg:pb-6 text-xl lg:text-4xl font-bold">Blog</h3>

            <p class="text-sm xl:text-base space-y-1 py-2 max-w-3xl">
                Stay updated with Informative, Educational and Entertaining News and Resources.
            </p>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-x-10 mt-6 md:mt-10 py-6 lg:pb-10">
                @foreach($posts as $post)
                    <div class="w-full rounded-md bg-white dark:bg-slate-800 shadow-sm hover:shadow-orange-100 hover:scale-[1.01] rounded-md transition-all ease-in-out duration-300">
                        <div class="py-4 px-2">
                            <h3 class="py-2 font-semibold text-blue-600 dark:text-blue-300 text-lg">
                                <a href="{{ route('post.show', $post->slug) }}" class="hover:text-creator-primary hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <p class="py-2 text-sm xl:text-base dark:text-slate-400">
                                {{ $post->excerpt }}
                            </p>

                            <p class="mt-1 pb-3 text-xs text-gray-500">
                                {{ $post->created_at->format('F j, Y') }}
                            </p>

                            <x-parts.learn-more-link href="{{ route('post.show', $post->slug) }}">
                                Read for Free.
                            </x-parts.learn-more-link>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="max-w-sm mx-auto mt-2 py-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-guest-layout>

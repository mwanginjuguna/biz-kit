<div class="md:flex md:items-center overflow-hidden bg-white rounded-lg shadow-lg dark:bg-slate-700">
    <div class="hidden md:block relative w-full md:h-[520px]  md:w-1/3 bg-gradient-to-l from-red-500 dark:from-red-900 via-red-300 dark:via-red-500 to-red-400 dark:to-red-900">
        <video class="absolute top-0 left-0 w-full h-full object-top" controls autoplay loop muted>
            <source src="{{ $videoUrl ?? asset('assets/cn-njihia-video.mp4') }}" type="video/mp4">
        </video>
    </div>

    <div class="md:w-2/3 p-4 md:p-4">
        <p class="w-max my-3 py-1 px-2 bg-slate-100 dark:bg-slate-800 font-medium text-sm text-orange-500 rounded-lg border border-slate-200 dark:border-orange-500">
            {{ $hook ?? 'Personal Training'}}
        </p>
        <h3 class="my-3 py-1 text-xl font-bold">
            {{$heading ?? 'The personalized attention you need to achieve your fitness goals'}}
        </h3>

        <ul class="space-y-1 py-2 text-gray-500 list-inside dark:text-gray-400">
            {{ $slot }}
        </ul>

        <x-utils.five-stars class="my-3"/>

        <div class="flex justify-between mt-5 py-2 item-center">
            <x-primary-link href="{{ $href ?? route('contact-me') }}">
                {{ $linkText ?? 'Get More Information.' }}
            </x-primary-link>
        </div>
    </div>
</div>

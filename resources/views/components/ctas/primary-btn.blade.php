@props(['button' => true, 'type' => 'submit'])

@if($button)
    <button type="{{ $type ?? 'submit' }}"
        class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-700 bg-red-700 px-4 mdpx-7 py-3.5 font-semibold md:leading-6 text-white hover:border-red-600 hover:bg-red-600 hover:text-white focus:ring focus:ring-red-400/50 active:border-red-700 active:bg-red-700 dark:focus:ring-red-400/90"
    >
        <svg class=" inline-block size-5 opacity-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
        </svg>

        <span>{{ $slot ?? 'Get Started' }}</span>
    </button>
@else
    <a
        href="{{ $attributes }}"
        class="inline-flex items-center justify-center gap-2 rounded-lg border border-red-700 bg-red-700 px-7 py-3.5 font-semibold leading-6 text-white hover:border-red-600 hover:bg-red-600 hover:text-white focus:ring focus:ring-red-400/50 active:border-red-700 active:bg-red-700 dark:focus:ring-red-400/90"
    >
        <svg class=" inline-block size-5 opacity-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z"/>
        </svg>

        <span>{{ $slot ?? 'Get Started' }}</span>
    </a>
@endif

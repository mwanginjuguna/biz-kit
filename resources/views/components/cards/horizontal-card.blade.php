@props(['heading', 'link' => ''])

<div class="p-6 text-xs sm:text-sm lg:text-base bg-slate-50 border border-slate-200 rounded-lg shadow dark:bg-slate-800 dark:border-slate-700">
    <a href="{{ $link ?? '' }}">
        <h5 class="mb-2 lg:text-xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
            {{ $heading }}
        </h5>
    </a>
    {{ $slot }}

    @if($link)
        <x-parts.learn-more-link href="$link">{{ $linkText ?? 'Learn More' }}</x-parts.learn-more-link>
    @elseif($action)
        {{ $action }}
    @endif
</div>


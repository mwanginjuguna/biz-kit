<a href="{{ $href ?? '#' }}" class="inline-flex items-center -mx-1 text-sm text-orange-600 capitalize transition-colors duration-300 transform dark:text-orange-500 hover:underline hover:text-orange-500 dark:hover:text-orange-400">
    <span class="mx-1">{{ $slot ?? 'Learn More' }}</span>
    <svg class="w-4 h-4 mx-1 rtl:-scale-x-100" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
</a>

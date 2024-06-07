@props(['user', 'profileImage' => ''])

<div class="flex-shrink-0 group block">
    <div class="flex items-center">
        @if(strlen($profileImage) > 0)
        <img class="inline-block flex-shrink-0 size-[36px] rounded-full" src="{{ $profileImage }}" alt="Profile image for {{ $user->name }}">
        @else
            <span class="inline-block size-[36px] bg-slate-200 dark:bg-slate-800 rounded-full overflow-hidden">
                <svg class="size-full text-slate-300 dark:text-slate-700" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white"></rect>
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor"></path>
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor"></path>
                </svg>
            </span>
        @endif
            <div class="ms-3">
            <h3 class="font-medium text-slate-700 dark:text-slate-300">{{ $user->name }}</h3>
            <p class="text-sm font-light text-slate-400 dark:text-slate-500">{{ $user->email }}</p>
        </div>
    </div>
</div>

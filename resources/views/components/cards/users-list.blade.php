<div>
    <ul class="max-w-xs flex flex-col">
        @foreach($users as $user)
            <li class="inline-flex items-center gap-x-3.5 py-3 px-4 text-sm font-medium bg-white border border-gray-200 text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-neutral-900 dark:border-neutral-700 dark:text-white">
                <x-utils.user-avatar />
            </li>
        @endforeach
    </ul>
</div>

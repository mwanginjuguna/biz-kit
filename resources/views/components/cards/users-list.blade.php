@props(['users'])

<div>
    <ul class="max-w-xs flex flex-col">
        @forelse($users as $user)
            <li class="inline-flex items-center gap-x-3.5 py-3 px-4 text-sm font-medium bg-white border border-slate-200 text-slate-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
                <x-utils.user-avatar :$user />
            </li>
        @empty
            <li class="inline-flex items-center gap-x-3.5 py-3 px-4 text-sm font-medium bg-white border border-slate-200 text-slate-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-slate-800 dark:border-slate-700 dark:text-slate-100">
                No Users Yet.
            </li>
        @endforelse
    </ul>
</div>

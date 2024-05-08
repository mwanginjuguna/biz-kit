<a href="{{ route('cart') }}" class="w-fit flex text-orange-500">
    <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
    </svg>
    <span id="cart-items-count" class="w-fit h-fit py-px px-1 text-[10px] -mt-1 -ml-1.5 bg-white rounded-full text-black z-10">{{ $items ?? 0 }}</span>
</a>

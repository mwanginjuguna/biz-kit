<div class="text-slate-800 dark:text-slate-200">
    <div>
        @forelse($orders as $order)
            <div
                class="mt-5 px-5 py-4 grid md:grid-cols-3 gap-x-1.5 bg-white dark:bg-slate-800 rounded-lg shadow-md"
            >
                <div class="col-span-1 text-sm px-3 flex flex-col gap-y-2">
                    <div class="flex md:flex-row gap-x-4 border-b dark:border-slate-600">
                        <p class="font-semibold text-amber-800 dark:text-amber-500">Order Number: </p>
                        <a href="{{route('orders.show', $order->id)}}" class="text-sky-500 dark:text-sky-400 dark:hover:text-sky-500 hover:underline underline-offset-2 hover:text-sky-600 flex">
                            <span class="pr-1">{{ $order->order_number }}</span>
                            <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#EE8700;" d="M156.98,0C86.328,0,28.849,57.479,28.849,128.132c0,62.689,45.263,114.969,104.818,125.968 l0.037-23.753l0.039-24.058c-33.678-10.031-58.311-41.263-58.311-78.156c0.002-44.965,36.583-81.548,81.548-81.548 s81.548,36.583,81.548,81.548c0,7.792-1.103,15.465-3.244,22.825l20.21,13.081l19.969,12.927 c6.348-15.393,9.649-31.943,9.649-48.833C285.112,57.479,227.632,0,156.98,0z"></path> <path style="fill:#5286FA;" d="M472.517,304.523L169.82,108.579c-7.16-4.634-16.277-4.986-23.771-0.918l0,0 c-7.494,4.068-12.166,11.905-12.18,20.432l-0.582,360.574c-0.016,9.895,6.221,18.718,15.551,22.007 c2.537,0.894,5.149,1.325,7.736,1.325c6.932,0,13.668-3.101,18.176-8.722L285.705,364.92l0,0l176.472-17.668 c9.845-0.986,17.993-8.084,20.319-17.699C484.823,319.937,480.822,309.901,472.517,304.523z"></path> <path style="fill:#424EDE;" d="M133.871,128.095l-0.582,360.574c-0.016,9.895,6.221,18.718,15.551,22.007 c2.537,0.894,5.149,1.325,7.736,1.325c6.932,0,13.668-3.101,18.176-8.722l110.955-138.356L146.05,107.663 C138.556,111.73,133.883,119.567,133.871,128.095z"></path> </g></svg>
                        </a>
                    </div>

                    <div class="flex flex-row gap-x-1.5 border-b dark:border-slate-600">
                        <p class="font-semibold text-amber-800 dark:text-amber-500">Status: </p>
                        <p class="text-slate-700 dark:text-slate-300">{{ $order->status }}</p>
                    </div>

                    <div class="flex flex-row gap-x-1.5 border-b dark:border-slate-600">
                        <p class="font-semibold text-amber-800 dark:text-amber-500">Total: </p>
                        <p>{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</p>
                    </div>

                    <div class="flex flex-row gap-x-1.5">
                        <p class="font-semibold text-amber-800 dark:text-amber-500">Date: </p>
                        <p>{{ $order->created_at->format('F j, Y') }}</p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2 px-3 md:pl-2 md:border-l">
                    <div class="space-y-1 text-sm">
                        <p class="text-amber-800 dark:text-amber-500">
                            Payment Details:
                            @if($order->is_paid)
                                <span class="text-green-700 dark:text-green-500 uppercase">
                                Paid {{ isset($order->payment_gateway) ? ' via '. $order->payment_gateway : '' }}
                            </span>
                            @else
                                <span class="text-red-700 dark:text-red-500 uppercase">
                                Not Paid
                            </span>
                            @endif
                        </p>
                        <p class="md:pl-4">
                            Payment Id:
                            <span class="text-xs text-slate-600 dark:text-slate-400">
                            {{ $order->payment_id ?? 'Not Set'}}
                        </span>
                        </p>
                    </div>

                    <div class="mt-1 text-xs ">
                        <p class="font-semibold text-sm text-amber-800 dark:text-amber-500">Customer Details </p>
                        <p class="leading-tight italic">{{ $order->customer_name }}</p>
                        <p class="leading-tight italic">{{ $order->customer_email }}</p>
                        <p class="leading-tight italic">{{ $order->customer_phone }}</p>
                    </div>
                </div>

                <a href="{{ route('orders.show', $order->id) }}" class="md:col-span-3 mt-1 px-5 text-right text-sm underline underline-offset-4 decoration-dotted text-blue-500 hover:text-blue-600 dark:hover:text-blue-400">
                    View Order
                </a>
            </div>
        @empty
            <div class="py-2">
                No orders Yet.
            </div>
        @endforelse
    </div>

    <div class="max-w-sm mx-auto py-2 mt-6">
        {{ $orders->links() }}
    </div>
</div>

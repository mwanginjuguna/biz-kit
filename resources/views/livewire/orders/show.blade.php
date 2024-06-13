<div>
    <div class="text-slate-800 dark:text-slate-200">
        <div class="mt-5">
            <h3 class="font-extrabold text-xl lg:text-2xl">Order Summary: ({{ $order->order_number }})</h3>
        </div>

        <div class="grid md:grid-cols-2 gap-6 items-center px-5 py-4 mt-3 text-slate-700 dark:text-slate-300 bg-slate-200 dark:bg-slate-800 rounded-sm">
            <div class="text-sm">
                <h4 class="text-base font-bold pb-1.5">Order Balances</h4>

                <div class="flex md:flex-row gap-x-4">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Order Number: </p>
                    <a href="{{route('orders.show', $order->id)}}" class="text-sky-500 dark:text-sky-400 dark:hover:text-sky-500 hover:underline underline-offset-2 hover:text-sky-600 flex">
                        <span class="pr-1">{{ $order->order_number }}</span>
                        <svg height="18px" width="18px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path style="fill:#EE8700;" d="M156.98,0C86.328,0,28.849,57.479,28.849,128.132c0,62.689,45.263,114.969,104.818,125.968 l0.037-23.753l0.039-24.058c-33.678-10.031-58.311-41.263-58.311-78.156c0.002-44.965,36.583-81.548,81.548-81.548 s81.548,36.583,81.548,81.548c0,7.792-1.103,15.465-3.244,22.825l20.21,13.081l19.969,12.927 c6.348-15.393,9.649-31.943,9.649-48.833C285.112,57.479,227.632,0,156.98,0z"></path> <path style="fill:#5286FA;" d="M472.517,304.523L169.82,108.579c-7.16-4.634-16.277-4.986-23.771-0.918l0,0 c-7.494,4.068-12.166,11.905-12.18,20.432l-0.582,360.574c-0.016,9.895,6.221,18.718,15.551,22.007 c2.537,0.894,5.149,1.325,7.736,1.325c6.932,0,13.668-3.101,18.176-8.722L285.705,364.92l0,0l176.472-17.668 c9.845-0.986,17.993-8.084,20.319-17.699C484.823,319.937,480.822,309.901,472.517,304.523z"></path> <path style="fill:#424EDE;" d="M133.871,128.095l-0.582,360.574c-0.016,9.895,6.221,18.718,15.551,22.007 c2.537,0.894,5.149,1.325,7.736,1.325c6.932,0,13.668-3.101,18.176-8.722l110.955-138.356L146.05,107.663 C138.556,111.73,133.883,119.567,133.871,128.095z"></path> </g></svg>
                    </a>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Status: </p>
                    <p class="text-slate-700 dark:text-slate-300">{{ $order->status }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Total: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->total, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Tax: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->tax, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Shipping fee: </p>
                    <p>{{ config('app.currency_symbol') . ' ' . number_format($order->shipping_fee, 2) }}</p>
                </div>

                <div class="flex flex-row gap-x-1.5">
                    <p class="font-semibold text-amber-800 dark:text-amber-500">Date: </p>
                    <p>{{ $order->created_at->format('F j, Y') }}</p>
                </div>
            </div>

            <div class="text-sm">
                <h4 class="text-base font-bold pb-1.5">Order Processing</h4>
                <div class="space-y-1 text-sm">
                    <p class="text-amber-800 dark:text-amber-500">
                        Payment Status:
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

                <div class="mt-2 space-y-1 text-xs md:text-sm xl:text-base">
                    <p class="font-semibold text-sm lg:text-base text-amber-800 dark:text-amber-500">Customer Details </p>
                    <p class="leading-tight italic">{{ $order->customer_name }}</p>
                    <p class="leading-tight italic">{{ $order->customer_email }}</p>
                    <p class="leading-tight italic">{{ $order->customer_phone }}</p>
                </div>
            </div>

            <div class="mt-5 text-sm md:col-span-2">
                <h4 class="font-medium">Order Notes:</h4>
                <p class="italic">{{$order->notes}}</p>
            </div>
        </div>

        <div class="my-4 md:my-6 md:px-5 px-3 py-4">

            <div class="grid space-y-2.5 text-slate-600 dark:text-slate-400">
                <h3 class="py-2 font-bold text-lg">Order Items</h3>

                @foreach($order->orderItems as $item)
                    <x-cards.order-item :item="$item" :isOrder="true" />
                @endforeach
            </div>
        </div>

        <!--payment buttons-->
        @if(!$order->is_paid)
            <div class="my-12 grid justify-end">
                <div class="mt-5 mx-auto place-content-center">
                    <a href="{{ route('orders.checkout', $order->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-lg"
                    >Complete Payments</a>
                </div>
            </div>
        @endif

        <a href="{{route('orders.index')}}"
           class="w-fit mt-4 p-3 md:px-5 flex bg-slate-200 hover:bg-slate-300 text-blue-600 rounded-lg">
            <p class="pr-2 font-semibold">Go Back</p>
            <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>back_2_fill</title> <g id="页面-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Arrow" transform="translate(-480.000000, -50.000000)" fill-rule="nonzero"> <g id="back_2_fill" transform="translate(480.000000, 50.000000)"> <path d="M24,0 L24,24 L0,24 L0,0 L24,0 Z M12.5934901,23.257841 L12.5819402,23.2595131 L12.5108777,23.2950439 L12.4918791,23.2987469 L12.4918791,23.2987469 L12.4767152,23.2950439 L12.4056548,23.2595131 C12.3958229,23.2563662 12.3870493,23.2590235 12.3821421,23.2649074 L12.3780323,23.275831 L12.360941,23.7031097 L12.3658947,23.7234994 L12.3769048,23.7357139 L12.4804777,23.8096931 L12.4953491,23.8136134 L12.4953491,23.8136134 L12.5071152,23.8096931 L12.6106902,23.7357139 L12.6232938,23.7196733 L12.6232938,23.7196733 L12.6266527,23.7031097 L12.609561,23.275831 C12.6075724,23.2657013 12.6010112,23.2592993 12.5934901,23.257841 L12.5934901,23.257841 Z M12.8583906,23.1452862 L12.8445485,23.1473072 L12.6598443,23.2396597 L12.6498822,23.2499052 L12.6498822,23.2499052 L12.6471943,23.2611114 L12.6650943,23.6906389 L12.6699349,23.7034178 L12.6699349,23.7034178 L12.678386,23.7104931 L12.8793402,23.8032389 C12.8914285,23.8068999 12.9022333,23.8029875 12.9078286,23.7952264 L12.9118235,23.7811639 L12.8776777,23.1665331 C12.8752882,23.1545897 12.8674102,23.1470016 12.8583906,23.1452862 L12.8583906,23.1452862 Z M12.1430473,23.1473072 C12.1332178,23.1423925 12.1221763,23.1452606 12.1156365,23.1525954 L12.1099173,23.1665331 L12.0757714,23.7811639 C12.0751323,23.7926639 12.0828099,23.8018602 12.0926481,23.8045676 L12.108256,23.8032389 L12.3092106,23.7104931 L12.3186497,23.7024347 L12.3186497,23.7024347 L12.3225043,23.6906389 L12.340401,23.2611114 L12.337245,23.2485176 L12.337245,23.2485176 L12.3277531,23.2396597 L12.1430473,23.1473072 Z" id="MingCute" fill-rule="nonzero"> </path> <path d="M7.16075,10.9724 C8.44534,9.45943 10.3615,8.5 12.5,8.5 C16.366,8.5 19.5,11.634 19.5,15.5 C19.5,16.3284 20.1715,17 21,17 C21.8284,17 22.5,16.3284 22.5,15.5 C22.5,9.97715 18.0228,5.5 12.5,5.5 C9.55608,5.5 6.91086,6.77161 5.08155,8.79452 L4.73527,6.83068 C4.59142,6.01484 3.81343,5.47009 2.99759,5.61394 C2.18175,5.7578 1.637,6.53578 1.78085,7.35163 L2.82274,13.2605 C2.89182,13.6523 3.11371,14.0005 3.43959,14.2287 C3.84283,14.5111 4.37354,14.5736 4.82528,14.4305 L10.4693,13.4353 C11.2851,13.2915 11.8299,12.5135 11.686,11.6976 C11.5422,10.8818 10.7642,10.337 9.94833,10.4809 L7.16075,10.9724 Z" id="路径" fill="#2563eb"> </path> </g> </g> </g> </g></svg>
        </a>
    </div>
</div>

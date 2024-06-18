<div>
    <div class="py-6 rounded-lg flex flex-col space-x-3">
        <p class="w-fit px-6 mb-4 py-2 text-amber-500 text-sm font-bold rounded-md">
            Total Due: <span class="underline ml-4">
                {{ config('app.currency_symbol') }} {{ number_format($amount, 2) }} / {{ $currencySymbol . ' ' . number_format($currencyAmount, 2) }}
            </span>
        </p>
        <input id="order-id" class="hidden" hidden value="{{ $order->id }}">

        <div id="paypal-button-container"></div>
    </div>

    <!--Paypal javascript-->
    @assets
    <script src="https://www.paypal.com/sdk/js?client-id={{ config('app.env') === 'production' ? config('paypal.live.client_id') : config('paypal.sandbox.client_id')}}&currency={{ $currencyName ?? 'USD' }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endassets

    @script
    <script>
        const order_id = document.getElementById('order-id').value;

        await paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return fetch(`/api/paypal/order/${order_id}/pay`, {
                    method: 'post',
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    return orderData.id;
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return fetch(`/api/paypal/order/${order_id}/capture`, {
                    method: 'post',
                    body: JSON.stringify({
                        orderId : data.orderID,
                        payerId : data.payerID,
                        facilitatorAccessToken : data.facilitatorAccessToken,
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    const element = document.getElementById('paypal-button-container');
                    element.innerHTML = '';
                    element.innerHTML = '<p>Thank you. We have received your payment! <a href="/dashboard" class="text-violet-500 hover:underline hover:text-orange-500 font-medium">Go to Orders Dashboard</a></p>';
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: "Payment Received!",
                        footer: '<a class="text-violet-500 hover:underline hover:text-orange-500 font-medium" href="'+`/orders/${order_id}`+'">Go to orders dashboard.</a>'
                    });
                    paid();
                });
            },
            onCancel: (data, actions) => {
                return fetch(`/api/paypal/order/${order_id}/cancel`, {
                    method: 'post',
                    body: JSON.stringify({
                        orderId: data.orderID,
                    })
                }).then(function(res) {
                    return res.json();
                }).then(function(orderData) {
                    let errorDetail = Array.isArray(orderData.details) && orderData.details[0];

                    if (errorDetail && errorDetail.issue === 'INSTRUMENT_DECLINED') {
                        flash('Critical Error!', `Payment Instrument Declined! Try Again.`, 'danger');
                        return actions.restart(); // Recoverable state, per:
                        // https://developer.paypal.com/docs/checkout/integration-features/funding-failure/
                    }
                    let msg = 'Sorry, your transaction could not be processed.';
                    if (errorDetail) {
                        if (errorDetail.description) msg += '\n\n' + errorDetail.description;
                        if (orderData.debug_id) msg += ' (' + orderData.debug_id + ')';
                        flash('Fatal Error!', `${msg}`, 'danger'); // Show a failure message (try to avoid alerts in production environments)
                    }
                    flash('Fatal Error!', `Order was Cancelled (Status: ${orderData.error.name})! \n Error Message: ${orderData.error.message}.\n TRY AGAIN!`, 'error');
                });
            },
            onError: (error) => {

            }
        }).render('#paypal-button-container');
    </script>
    @endscript
</div>

<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal;

class PaymentsController extends Controller
{
    public function pay(Order $order): JsonResponse|RedirectResponse
    {
        $amountInfo = session('currencyName');

        dd($amountInfo);

        $amount = $amountInfo['amount'] ?? ($order->total / Currency::firstWhere('name', $amountInfo['currencyName'])->rate);
        $currency = $amountInfo['currencyName'] ?? 'USD' ?? $order->currency;

        // initialize paypal client
        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $paypal_order = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success', $order->id),
                "cancel_url" => route('payment.cancel', $order->id)
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $currency,
                        "value" => $amount,
                    ]
                ]
            ]
        ]);
        if (isset($paypal_order['id']) && $paypal_order['id'] != null) {
            foreach ($paypal_order['links'] as $links) {
                if ($links['rel'] == 'approve') {

                    $userId = Auth::id();

                    Payment::updateOrCreate(
                        ['order_id' => $order->id, 'user_id' => $userId],
                        [
                            'transaction_status' => $paypal_order['status'],
                            'user_id' => $userId
                        ]
                    );

                    return response()->json($paypal_order);
                }
            }
        }

        return redirect()
            ->route('orders.checkout', $order->id)
            ->with('message', 'Something Went Wrong while Connecting! Try Again or Contact Support');
    }

    public function capture(Request $request, Order $order): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $paypalOrderId = $data['orderId'];

        // Initialize paypal
        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        // capture payment details
        $response = $provider->capturePaymentOrder($paypalOrderId);

        if (isset($response['status']) && $response['status'] === 'COMPLETED')
        {
            // update @Payment $payment && Order $order details and save to db
            $payment = Payment::query()
                ->where('order_id', '=', $order->id)
                ->first();
            $payerId = $data['payerId'];
            $paidAmount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payerName = $response['purchase_units'][0]['shipping']['name']['full_name'];

            $paypalFacilitatorAccessToken = $data['facilitatorAccessToken'];
            $payment->transaction_status = $response['status'];
            $payment->paypal_transaction_id = $paypalOrderId;
            $payment->paypal_payer_id = $payerId;
            $payment->paypal_facilitator_access_token_id = $paypalFacilitatorAccessToken;
            $payment->total_paid = $paidAmount;
            $payment->user_name = $payerName;
            $payment->payer_country_code = $response['purchase_units'][0]['shipping']['address']['country_code'];
            $payment->save();

            $order->amount_due = $order->amount - $paidAmount;
            $order->paid = true;
            $order->status = 'processing';
            $order->save();

            // notify user and admin

            // $this->dispatch(new SendPaymentReceivedEmailJob(user: $user, data: $emailData));

            return response()->json(["success" => true, 'data' => $data]);

        } elseif (isset($response['debug_ID'])) {
            $paymentError = [
                "name" => $response['name'],
                "error" => $response['message'],
                "details" => $response['details']
            ];

            return response()->json($paymentError);
        } else {
            return response()->json($response);
        }
    }

    // cancel payment
    public function cancel(Order $order): RedirectResponse
    {
        $payment = Payment::query()->where('order_id', '=', $order->id);
        $payment->status = 'CANCELLED';
        $payment->save();

        // notify admin
        return redirect()
            ->route('orders.checkout')
            ->with('success', 'Transaction was Cancelled! Your account was not Billed.');
    }

    // success url
    public function success(Request $request, Order $order): RedirectResponse
    {
        $provider = new PayPal();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] === 'COMPLETED')
        {
            // capture transaction details and save to db
            $payment = Payment::query()
                ->where('order_id', '=', $order->id)
                ->first();
            $payment->status = $response['status'];
            $payment->paypal_transaction_id = $response;
            $payment->save();

            $order->paid = 'Yes';
            $order->status = 'new';
            $order->save();
            return redirect()->route('orders-index')
                ->with('success', 'Payment for Order #'.$order->id.' was Successful');
        } else {
            return redirect()
                ->route('orders.checkout', $order->id)
                ->with('message', $response['message'] ?? 'Something Went Wrong');
        }
    }
}

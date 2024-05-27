<?php

namespace App\Mpesa;

use App\Models\MpesaStk;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class StkPush
{
    public string $failed;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->failed = false;
    }

    public function init(int $phoneNumber, int $orderId, int $amount, string $accNumber)
    {
        /** @var Response */
        $response = Mpesa::stkpush(phonenumber: $phoneNumber, amount: $amount, account_number: $accNumber);

        $result = json_decode($response, true);

        MpesaStk::create([
            'merchant_request_id' => $result['MerchantRequestID'],
            'checkout_request_id' => $result['CheckoutRequestID'],
            'response_code' => $result['ResponseCode'],
            'response_desc' => $result['ResponseDescription'],
            'customer_message' => $result['CustomerMessage'],
            'phone_number' => $phoneNumber,
            'order_id' => $orderId,
        ]);

        return $result;
    }

    public function confirm(Request $request)
    {
        $payload = json_decode($request->getContent());

        if (property_exists($payload, 'Body') && $payload->Body->stkCallback->ResultCode == '0') {
            $merchant_request_id = $payload->Body->stkCallback->MerchantRequestID;
            $checkout_request_id = $payload->Body->stkCallback->CheckoutRequestID;
            $result_desc = $payload->Body->stkCallback->ResultDesc;
            $result_code = $payload->Body->stkCallback->ResultCode;
            $amount = $payload->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $mpesa_receipt_number = $payload->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $transaction_date = $payload->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $phoneNumber = $payload->Body->stkCallback->CallbackMetadata->Item[4]->Value;

            $data = [
                'result_desc' => $result_desc,
                'result_code' => $result_code,
                'merchant_request_id' => $merchant_request_id,
                'checkout_request_id' => $checkout_request_id,
                'amount' => $amount,
                'mpesa_receipt_number' => $mpesa_receipt_number,
                'transaction_date' => $transaction_date,
                'phone_number' => $phoneNumber,
            ];

            MpesaStk::updateOrCreate(
                [
                    'merchant_request_id' => $merchant_request_id,
                    'checkout_request_id' => $checkout_request_id
                ],
                $data
            );
        } else {
            $this->failed = true;
        }

        return $this;
    }

    public function query(string $checkoutRequestId)
    {
        /** @var Response */
        $res = Mpesa::stkquery($checkoutRequestId);

        $result = json_decode((string)$res, true);

        MpesaStk::updateOrCreate(
            [
                'merchant_request_id' => $result['MerchantRequestID'],
                'checkout_request_id' => $result['CheckoutRequestID']
            ],
            [
                'merchant_request_id' => $result['MerchantRequestID'],
                'checkout_request_id' => $result['CheckoutRequestID'],
                'result_code' => $result['ResponseCode'],
                'result_desc' => $result['ResultDesc'],
            ]
        );

        return $result;
    }
}

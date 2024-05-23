<?php

namespace App\Mpesa;

use App\Models\MpesaC2b;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class C2B
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function confirm(Request $request)
    {
        $payload = $request->getContent();

        Log::info('C2B Confirmation endpoint hit. Payload: ', ['payload' => $payload]);

        $transaction = MpesaC2b::create([
            'transaction_type' => $payload['TransactionType'],
            'transaction_id' => $payload['TransID'],
            'transaction_time' => $payload['TransTime'],
            'amount' => $payload['TransAmount'],
            'business_shortcode' => $payload['BusinessShortCode'],
            'account_number' => $payload['BillRefNumber'],
            'invoice_no' => $payload['InvoiceNumber'],
            'organization_account_balance' => $payload['OrgAccountBalance'],
            'thirdparty_transaction_id' => $payload['ThirdPartyTransID'],
            'phone_number' => $payload['MSISDN'],
            'first_name' => $payload['FirstName'],
            'last_name' => $payload['LastName'],
        ]);

        return $transaction;
    }
}

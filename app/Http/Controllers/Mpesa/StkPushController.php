<?php

namespace App\Http\Controllers\Mpesa;

use App\Http\Controllers\Controller;
use App\Models\MpesaStk;
use App\Mpesa\StkPush;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StkPushController extends Controller
{
    /**
     * Process STK Push (Mpesa Express) Payments. To learn more, visit
     * https://developer.safaricom.co.ke/APIs/MpesaExpressSimulate
     */

    /**
     * Initialize stk API
     */
    public function stkInit(Request $request)
    {
        $phoneNumber = $request->input('phone-number',254715219991);

        $accNumber = $request->input( 'account-number',123456);

        $amount = $request->input( 'amount',10);

        return (new StkPush())->init($phoneNumber, $amount, $accNumber);
    }

    public function stkConfirm(Request $request): JsonResponse
    {
        $result = (new StkPush())->confirm($request);

        if ($result->failed) {
            $response = [
                'ResultCode' => 1,
                'ResultDesc' => 'An error occurred.'
            ];
        } else {
            $response = [
                'ResultCode' => 0,
                'ResultDesc' => 'Success.'
            ];
        }

        return response()->json($response);
    }

    public function stkQuery(Request $request)
    {
        $result = (new StkPush())->query($request->input('checkoutRequestId'));

        return $result;
    }
}

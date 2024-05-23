<?php

namespace App\Http\Controllers\Mpesa;

use App\Http\Controllers\Controller;
use App\Mpesa\C2B;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class C2BController extends Controller
{
    public function registerUrls()
    {
        $shortCode = 654321;

        /** @var Response $res */
        $res = Mpesa::c2bregisterURLS($shortCode);

        $result = $res->json();

        if ($result['ResponseCode'] === 0) {
            Log::notice('C2B Urls registered successfully.');
        } else {
            Log::error('C2B Urls could not be registered.'.PHP_EOL.'Message => '.$result['ResponseDescription']);
        }
        return $result;
    }

    public function validation()
    {
        Log::info('Validation endpoint has been hit');
        $result_code = "0";
        $result_description = "Accepted";
        return Mpesa::validationResponse($result_code, $result_description);
    }

    public function confirmation(Request $request)
    {
        return (new C2B())->confirm($request);
    }
}

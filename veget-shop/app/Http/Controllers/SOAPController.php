<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class SOAPController extends Controller
{
    // Gantilah dengan URL WSDL dari server yang sesuai
    private $wsdl = "http://localhost/resepku/public/server.php?wsdl";

    public function validateUser(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    try {
        $client = new SoapClient($this->wsdl);
        $response = $client->__soapCall('validateUser', [$email, $password]);

        if ($response === 'valid') {
            return response()->json([
                'success' => true,
                'result' => 1, // Berikan nilai 1 untuk valid
            ]);
        } else {
            return response()->json([
                'success' => true,
                'result' => 0, // Berikan nilai 0 untuk tidak valid
            ]);
        }
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error occurred: ' . $e->getMessage()
        ]);
    }
}

}
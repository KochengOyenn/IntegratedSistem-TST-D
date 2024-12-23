<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$app->make('Illuminate\Contracts\Http\Kernel')->handle(
    \Illuminate\Http\Request::capture()
);

use App\Http\Controllers\SOAPController;

$wsdlUrl = __DIR__ . "/voucher.wsdl";
$server = new SoapServer($wsdlUrl);
$server->setClass(SOAPController::class);
$server->handle();

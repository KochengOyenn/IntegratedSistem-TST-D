<?php

require "vendor/autoload.php";
require "app/Http/Controllers/SOAPController.php";

use PHP2WSDL\PHPClass2WSDL;
use App\Http\Controllers\SOAPController;

// Inisialisasi generator
$gen = new PHPClass2WSDL(SOAPController::class, "http://localhost/resepku/public/server.php");

// Generate WSDL
$gen->generateWSDL();
file_put_contents("public/voucher.wsdl", $gen->dump());

echo "WSDL Generated Successfully!";

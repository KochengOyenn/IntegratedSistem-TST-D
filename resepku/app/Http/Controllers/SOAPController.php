<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SOAPController
{
    /**
     * Validasi SOAP untuk pengguna.
     *
     * @param string $email
     * @param string $password
     * @return string
     */
    public function validateUser(string $email, string $password): string
{
    \Log::info("Request received: Email = $email");

    try {
        $user = User::where('email', $email)->first();
        \Log::info("User found: " . json_encode($user));

        if ($user && Hash::check($password, $user->password)) {
            return "valid";
        }
        return "not valid";
    } catch (\Exception $e) {
        \Log::error("Error in validateUser: " . $e->getMessage());
        return "error";
    }
}

}

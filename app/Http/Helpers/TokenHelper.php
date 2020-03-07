<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;

class TokenHelper
{
    protected static function RandomToken($length = 32)
    {
        if(!isset($length) || intval($length) <= 15 ){
            $length = 32;
        }

        try {
            if (function_exists('random_bytes')) {
                return bin2hex(random_bytes($length));
            }
            if (function_exists('openssl_random_pseudo_bytes')) {
                return bin2hex(openssl_random_pseudo_bytes($length));
            }
        } catch (\Exception $e) {
            Log::channel('critical')->critical('Token generation error', $e->getTrace());
        }
    }
}

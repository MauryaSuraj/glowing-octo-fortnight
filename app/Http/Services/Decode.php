<?php

namespace App\Http\Services;

class Decode{

    public static function dec($request){ 
        return openssl_decrypt(
            $request,
            config('encdep.ciphering'),
            config('encdep.encryption_key'),
            0,
            config('encdep.encryption_iv')
        );
    
    }

}
<?php

namespace App\Http\Services;

class Encode {

    public static function enc($request = null){

        return openssl_encrypt(
            $request,
            config('encdep.ciphering'),
            config('encdep.encryption_key'),
            0,
            config('encdep.encryption_iv')
        );
    }

}
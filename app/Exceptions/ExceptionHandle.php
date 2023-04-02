<?php

namespace App\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ExceptionHandle
{
    const customMessage = "Something went wrong";
    
    public static function log($exception = null){

        if( $exception instanceof QueryException ){
            Log::error($exception);
        }

        if ( $exception instanceof UserExceptions ){
            Log::error($exception);
            return new UserExceptions($exception->getMessage());
        }

        return new UserExceptions(self::customMessage);
    }

}
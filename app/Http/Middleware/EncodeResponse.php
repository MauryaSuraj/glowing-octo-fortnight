<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Services\Encode;
use Illuminate\Support\Facades\Log;

class EncodeResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        return $response = $next($request);

        if(!isset($request->output)){
            $r = $response->getContent();
            try {
                $output = Encode::enc($r);
            } catch (\Exception $e) {
                Log::info($r);
                throw $e;
            }
            $errCode = $response->status();
            $request->output = $output;
        }

        return response()->json([
            'res_data' => $request->output,
        ], 200);
    }
}

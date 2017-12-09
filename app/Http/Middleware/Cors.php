<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => 'http://dw.knoblau.ch',
            'Access-Control-Allow-Headers' => 'Origin, Content-Type, Origin, Authorization',
            'Access-Control-Allow-Methods' => 'GET, POST, PUT, DELETE, OPTIONS'
        ];

        if ($request->getMethod() != "OPTIONS") {
            return $next($request);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }
        return $response;
    }    
}

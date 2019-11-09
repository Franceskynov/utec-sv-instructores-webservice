<?php

/*
|--------------------------------------------------------------------------
| Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
|--------------------------------------------------------------------------
|
*/
namespace App\Http\Middleware;

use Closure;

class HeadersHandlers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
		$response->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');
		// $response->header('Pragma', 'no-cache');
		// $response->header('X-XSS-Protection', '1; mode=block');
		$response->header('X-Powered-By','Franceskynov');
		$response->header('X-Content-Type-Options', 'nosniff');
		$response->header('Server', 'Server');
		// $response->header('Referrer Policy','no-referrer-when-downgrade');
		$response->header('access-control-expose-headers', '*');
		return $response;
    }
}

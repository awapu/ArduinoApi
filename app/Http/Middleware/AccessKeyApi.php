<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessKeyApi
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

        $apikey = $request->headers->get('x_api_key');

        if ($apikey != env('X_API_KEY')) {
            return response()->json(['message' => 'No Autorizado']);
        }

        return $next($request);
    }
}

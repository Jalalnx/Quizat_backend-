<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAccess
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
       if (!empty(env('AUTH0_AUDIENCE')) && !empty(env('AUTH0_DOMAIN'))) {
            $verifier = new JWTVerifier([
                'valid_audiences' => [env('AUTH0_AUDIENCE')],
                'authorized_iss' => [env('AUTH0_DOMAIN')],
                'supported_algs' => ['RS256']
            ]);
            $token = $request->bearerToken();
            $decodedToken = $verifier->verifyAndDecode($token);
            if (!$decodedToken) {
                abort(403, 'Access denied');
            }
        }
        return $next($request);
    }
}

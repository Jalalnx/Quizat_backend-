<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth0\SDK\JWTVerifier;


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

         $Bearer = $request->bearerToken();
        if ( empty( $accessToken ) ) {
             abort(401, 'Bearer token missing');   
          
        }


       if (!empty(env('AUTH0_AUDIENCE')) && !empty(env('AUTH0_DOMAIN'))) {
         try {
        //    $verifier = new JWTVerifier([
        //         'valid_audiences' => [env('AUTH0_AUDIENCE')],
        //         'authorized_iss' => [env('AUTH0_DOMAIN')],
        //         'supported_algs' => ['RS256']
        //     ]);

        
        $algorithm = 'RS256';

        if ($token === null) {
            die('No `token` request parameter.');
        }

        $token = new \Auth0\SDK\Token([
        'domain' => $env['AUTH0_DOMAIN'],
        'clientId' => $env['AUTH0_CLIENT_ID'],
        'clientSecret' => $env['AUTH0_CLIENT_SECRET'],
        'tokenAlgorithm' => $algorithm
        ], $Bearer, \Auth0\SDK\Token::TYPE_ID_TOKEN);
           

        $token->verify();

        $token->validate();

            // if (!$decodedToken) {
            //     abort(403, 'Access denied');
            // };
        } catch ( \Exception $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }

            
        }
        return $next($request);
    }
}

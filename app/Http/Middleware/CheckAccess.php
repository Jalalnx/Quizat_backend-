<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Auth0\SDK\JWTVerifier;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

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

        //  $Bearer = $request->header('Authorization', '');  

        //  if ( empty( $Bearer ) )abort(401, 'Bearer token missing'); 

        //     if (Str::startsWith($Bearer, 'Bearer ')) 
        //     {            
        //     $Bearer = Str::substr($Bearer, 7);        
        //     };

        
           


    //    if (!empty(env('AUTH0_AUDIENCE')) && !empty(env('AUTH0_DOMAIN'))) {
        //  try {
        

        // $configuration = new SdkConfiguration(
        // domain: 'https://dev-iwack5ph0aok5elz.us.auth0.com/',
        // clientId:'YTX6wqx7qaEpRCHkhtUkcDi6nV2h0q9G',
        // clientSecret: 'cxsp2Zim-2r8xEsqfXBKaHOSmh2DvWvtfwyRwoMaiHvKVF_IVpO5vGymvG8IW0f4',
        // cookieSecret: '2r8xEsqfXBKaHOSmh2DvWvtfwyRwoMaiHvKVF_IVpO5vGymvG8IW0f4'.Str::random(15),
        // );

        // $token = new \Auth0\SDK\Token($configuration, $Bearer, \Auth0\SDK\Token::TYPE_ID_TOKEN);
    
        // $token->verify();

        // $token->validate();

            
        // } catch ( \Exception $e) {

        //     report($e);
        //     return  $e;//response()->json(['message' => $e->getMessage()], 401);
        // }

            
        // }    
        return $next($request);
    }
}

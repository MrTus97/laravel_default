<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class VerifyJWTToken
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
        dd('da vao middleware');
        // try {
        //     $user = JWTAuth::toUser($request->input('token'));
        // }catch (JWTException $e) {
           
        //     return response()->json(['error'=>'Token is required']);
        // }
        // TODO handle middleware here
        return $next($request);
    }
}


<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
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
        // dd('mi co vào k');
        try {
            //lấy token từ đoạn mã gửi lên
            $user = JWTAuth::parseToken()->authenticate();
        }catch (JWTException $e) {
           
            return response()->json(['error'=>'Token is required']);
        }
        
        return $next($request);

    }
}


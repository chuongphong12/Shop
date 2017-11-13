<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class CheckLevel
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
        if (Auth::check() && Auth::user()->level == 1) {
            return $next($request);
        }
        else{
            return redirect('admin/pages/login');
        }
        $response = $next($request);

        if ($request->method() != 'OPTIONS') {

            try {

                $token = $this->auth->setRequest($request)->parseToken()->refresh();

                $this->auth->setToken($token); // <-- This one will let request through without blacklist error

            } catch (Exceptions\TokenExpiredException $e) {

                return $this->respond('tymon.jwt.expired', 'token_expired', $e->getStatusCode(), [$e]);

            } catch (Exceptions\JWTException $e) {

                return $this->respond('tymon.jwt.invalid', 'token_invalid', $e->getStatusCode(), [$e]);

            }

            // send the refreshed token back to the client
            $response->headers->set('X-Token', $token);

        }

        return $response;
    }
}

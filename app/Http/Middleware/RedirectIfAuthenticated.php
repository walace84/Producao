<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * Lidar com um pedido recebido.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    // Faz a verificação de url, se está indo para admin o home 
    public function handle($request, Closure $next, $guard = null)
    {
       switch($guard){
           case 'admin':
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin.painel');
                }
                break;
            default;
                if (Auth::guard($guard)->check()) {
                    return redirect('/home');
                }
                break;    
       }

        return $next($request);
    }
}

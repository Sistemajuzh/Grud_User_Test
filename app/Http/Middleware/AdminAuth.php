<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role_id == 1 && auth()->user()->status == 1) {
            return $next($request);
        } elseif (auth()->check() && auth()->user()->role_id == 1 && auth()->user()->status == 2) {
            Session::flash('Error', 'Usted se encuentra Suspendido.');
            return redirect('cliente');
        }

        Session::flash('Error', 'Usted no tiene permiso para acceder a este contenido.');
        return redirect('cliente');
        // return redirect()->to('/');
    }
}

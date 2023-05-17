<?php

namespace App\Http\Middleware\Visitante;

use App\Repositorio\Util\UtilRepositorio;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitanteMiddleware
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
        if (!isset(auth()->user()->nivel)) {
            return $next($request);
        }
        else{
            $dashboard = UtilRepositorio::nivelForPage();
            return redirect($dashboard)->with('msg-error','Ação não permitida!');
        }
    }
}

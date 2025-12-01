<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthSimple
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->get('usuario_logado')) {
            return redirect()->route('login.index')->with('error', 'Acesso restrito. Faça login.');
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateBeforeRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica se a senha inserida pelo usuário está correta
        $password = $request->input('password');

        if ($password !== '123') {
            // Senha incorreta, redireciona de volta para a página de autenticação
            return redirect()->route('authentication.pass')->with('error', 'Senha incorreta.');
        }

        // Senha correta, permite o acesso à próxima rota
        return $next($request);
    }
}

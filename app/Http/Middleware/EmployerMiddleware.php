<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployerMiddleware
{
    /**
     * Проверяет есть ли у текущего пользователя резюме умплоуера
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(null === $request->user() || null === $request->user()->employer){
            error_log('sdfsdf');
            return redirect()->route('employer.create')
            ->with('error', 'Сначала вам нужно зарегистрироваться как работник');
        };
        return $next($request);
    }
}

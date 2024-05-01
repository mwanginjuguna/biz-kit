<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            if (Auth::user()->role !== 'A')
            {
                abort(Response::HTTP_FORBIDDEN);
            }

            return $next($request);

        } catch (\Exception $exception)
        {
            return redirect()->route('login');
        }
    }
}

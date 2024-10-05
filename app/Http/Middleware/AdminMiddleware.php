<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
             /** @var AppModels\User */
            $user = Auth::user();
            if ($user->hasRole(['super-admin','admin'])) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Closure;

class RedirectIfAuthenticated extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // Redirect based on user role
            $user = auth()->user();
            switch ($user->role) {
                case 'STUDENT':
                    return redirect()->route('student.dashboard');
                case 'MENTOR':
                    return redirect()->route('mentor.dashboard');
                case 'EMPLOYER':
                    return redirect()->route('employer.dashboard');
                case 'ADMIN':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
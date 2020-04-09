<?php

namespace App\Http\Middleware;

use Closure;

class TeacherAuth
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
        if (!auth('Teacher')->check()) {
            return redirect('teacher/login');
        }
        return $next($request);
    }
}

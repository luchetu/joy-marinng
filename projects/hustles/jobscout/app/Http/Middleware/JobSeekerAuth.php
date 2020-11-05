<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JobSeekerAuth
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
        config(['auth.guards.api.provider' => 'jobseekers']);
        return $next($request);
    }
}

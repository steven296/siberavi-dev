<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CustomAuthMiddleware
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
        $user = session('user');
        if (!$user) {

            return redirect('login');
        }

        \Config::set('database.connections.mysql_dinamic.username', $user->User);
        \Config::set('database.connections.mysql_dinamic.password', $user->pass);
        DB::connection('mysql_dinamic');

        return $next($request);
    }
}

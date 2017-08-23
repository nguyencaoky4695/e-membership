<?php


namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;

class VerifyUserAdmin
{
    public function handle($request, $next)
    {
        if (Session::get('login') == null) {

            return redirect('/admin/log-in');
        }
        else{
            return $next($request);
        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ViewerUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $user = Auth::user();

        if($user->role == 1){
            return redirect('staff/admin');
        }

        if($user->role == 2){
            return redirect('staff/editor');
        }

        if($user->role == 3){
            return $next($request);
        }

        if($user->role == 4){
            return redirect('staff/viewer');
        }
    }
}

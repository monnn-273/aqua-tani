<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RecruiterAuthenticated
{
    
    public function handle(Request $request, Closure $next): Response
    {
        if( Auth::check() )
        {
            /** @var User $user */
            $user = Auth::user();

            // if user is not admin take one to their dashboard
            if ( $user->hasRole(3) ) {
                return redirect('user/beranda');
            }

            else if($user->hasRole(1)) {
                return redirect('admin/dashboard');
            }

            // allow admin to proceed with request
            else if ( $user->hasRole(2) ) {
                return $next($request);
            }
        }

        abort(403);  // permission denied error
    }
}

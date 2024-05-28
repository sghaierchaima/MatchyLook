<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session; 
use Illuminate\Http\Request;
use App\Models\Utilisateur;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
       /*  if (Session::has('loginId') && Session::get('role') === 'admin') {
            return $next($request);
        }

        return redirect('/masterr')->with('fail', 'You do not have access to this section.'); */
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotUsers
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'users')
	{
	    
	    if (Session::get('id_usaha') == ""){
	        return redirect('account-login');
	    }

	    return $next($request);
	    // return redirect('admin/login');
	}
}
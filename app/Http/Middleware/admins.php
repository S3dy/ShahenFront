<?php

namespace App\Http\Middleware;

use Closure;

class admins
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
       if($request->session()->has('adminsession')){
            return $next($request);
        }else if($request->session()->has('freelancer_name')){
            return redirect('/ab/find-work');
        }else if($request->session()->has('provider_name')){
            return redirect('/postajob');
        }
        
        if(!$request->session()->has('adminsession') ){
            return redirect('/admin/login');   
        }

        return $next($request);

    }
}

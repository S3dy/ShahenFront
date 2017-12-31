<?php

namespace App\Http\Middleware;


use Closure;

class freelancer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request,Closure $next)
    {

        if($request->session()->has('adminsession')){
        //  return view('adminpanel.adminpanel');
            return redirect('/admin');
        }else if($request->session()->has('freelancer_id')){
            return redirect('/freeSession');
        }else if($request->session()->has('provider_id')){
            return redirect('/provideSession');
        }
        return $next($request);

    }
}

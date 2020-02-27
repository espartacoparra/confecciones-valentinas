<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class Admin
{
    protected $auth;

    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->type == "admin" ) {
           return $next($request);
        }elseif ($this->auth->user()->type == "members" ) {
           return redirect('/principal');
        }else{

            return redirect()->action("Auth\LoginController@logout");
        }
        
    
    }
}

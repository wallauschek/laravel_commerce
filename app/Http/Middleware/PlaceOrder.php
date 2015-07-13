<?php

namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PlaceOrder
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {


        if ($this->auth->guest()) {
            return redirect()->guest('auth/login');
        }else{
            if(!Session::has('cart')){
                return redirect('cart');
            }
        }

        return $next($request);
    }
}

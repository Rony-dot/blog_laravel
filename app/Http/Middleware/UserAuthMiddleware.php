<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        $user = User::find($request->session()->get('user_id'));
        if(!Session::has('user_id')){
            return redirect(route('login.page'))->with([
               'msg' => 'Unauthorized Access'
            ]);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;
use Auth;
use Session;
use Closure;

class Admin
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
        if(Auth::user()->quyen > 0){
            Session::flash('error','Bạn Không Có Quyền Truy Cập');
            return redirect()->back();
        }
        return $next($request);
    }
}

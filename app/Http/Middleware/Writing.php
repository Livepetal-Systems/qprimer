<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Writing
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
        if(session()->has('program') AND session()->has('question_num')){
            return $next($request); }
        else {
            return redirect('user/')->with('error', 'exam has not been initiaized');
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Cargo
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
        $start=strtotime('08:00:00');
        $end=strtotime('17:00:00');
        $now=time();
        if($now<$start||$now>$end){
            echo "不可修改";die;
        }
        return $next($request);
    }

}

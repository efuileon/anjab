<?php

namespace App\Http\Middleware;

use Closure;

class cekstatus
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
      $user = \App\User::where('username', $request->username)->first();
      return $user;
      if($user->level == 0){
        return redirect('pangkat/admin');
      } else {
        return redirect('pangkat');
      }

        return $next($request);
    }
}

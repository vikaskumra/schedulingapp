<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class ACL
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role='')
    {
            // echo $role;
		  //if (! $request->user()->hasRole($role))
         
          if(!empty($role))
          {
            if(Auth::user()->user_type==$role)
		     {
            // Redirect...
			 //   echo 'Add Role Access Check code here in app\Http\Middleware\ACL.php';
                return $next($request);
		     } 
          }
          
        return redirect()->route('login');        
    }
      
}

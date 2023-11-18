<?php

namespace App\Http\Middleware;

use Closure;

class AllowAdministratorAccess
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
        try 
        {
            $user = auth()->user();

            if ($user->isAdministratorUser()) {
                return $next($request);
            }
            else {
                auth()->logout();
                return redirect()->to('login');
            }
        } 
        catch (Exception $ex) 
        {
            logger($ex);
        }
    }
}

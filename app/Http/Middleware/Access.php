<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if($request->route()->getName() === "customer.listkk") {
        return redirect("/");
       } 
       elseif($request->route()->getName() === "customers.submit") {
        return response()->json([
            "status"=>false,
            "message"=> "access denied",
        ]);
       }
       else {
        return $next($request);
       }
        
    }
}

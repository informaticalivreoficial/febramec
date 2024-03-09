<?php

namespace App\Http\Middleware;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;

class TenantUrlCheck
{
    public function handle(Request $request, Closure $next)
    {
        $manangerT = app(ManangerTenant::class); 
        
        
        if(!$manangerT->isSubDomainMain()){
            abort(401);
            return;
        }
            
        return $next($request);
    }
   
}

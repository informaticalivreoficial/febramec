<?php

namespace App\Http\Middleware;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubDomainNotMain
{
    public function handle(Request $request, Closure $next): Response
    {
        $manangerT = app(ManangerTenant::class);         
        
        if($manangerT->isSubDomainMain()){
            abort(401);
        }
            
        return $next($request);
    }
}

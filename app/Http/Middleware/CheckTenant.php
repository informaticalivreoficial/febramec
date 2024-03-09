<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Tenant\ManangerTenant;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTenant
{
        
    public function handle(Request $request, Closure $next): Response
    {
        $manangerT = app(ManangerTenant::class);
        $tenant = $manangerT->tenant();

        if(!$tenant && $request->url() != route('404.error')){
            return redirect()->route('404.error');
        }
        
        return $next($request);
    }
    
}

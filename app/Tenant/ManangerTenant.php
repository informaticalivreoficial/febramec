<?php

namespace App\Tenant;

use App\Models\Tenant;

class ManangerTenant
{
    public function subdomain()
    {
        $pieces = explode('.', request()->getHost());
        return $pieces[0];
    }
    
    public function tenant()
    {
        $subdomain = $this->subdomain();
        $tenant = Tenant::where('subdomain', $subdomain)->first();
        return $tenant;
    }

    public function identify()
    {
        $tenant = $this->tenant();
        return $tenant->id;
    }

    public function getTenantIdentify()
    {
        dd(auth()->user()->tenant);
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function getTenant()
    {
        return auth()->check() ? auth()->user()->tenant : '';
    }

    public function isAdmin(): bool
    {
        return in_array(auth()->user()->email, config('acl.admins'));
    }

    public function isSubDomainMain(): bool
    {
        $subdomain = $this->subdomain();
        return $subdomain == config('tenants.subdomain_main');
        //return in_array($this->tenant()->subdomain, config('tenants.subdomain_main'));
    }
}
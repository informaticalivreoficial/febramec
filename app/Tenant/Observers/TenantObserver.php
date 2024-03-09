<?php

namespace App\Tenant\Observers;

use App\Tenant\ManangerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver
{
    public function creating(Model $model)
    {
        $tenant = app(ManangerTenant::class)->identify();
        $model->setAttribute('tenant', $tenant->id);
    }
}

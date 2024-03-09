<?php

declare(strict_types=1);

namespace App\Scopes;

use App\Tenant\ManangerTenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $identify = app(ManangerTenant::class)->identify();

        if ($identify)
            $builder->where('tenant', $identify);
    }

    public function applyy(Builder $builder, Model $model)
    {
        $identify = app(ManangerTenant::class)->identify();

        if ($identify)
            $builder->where('tenant', $identify);
    }
}

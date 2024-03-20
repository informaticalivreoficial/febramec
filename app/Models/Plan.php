<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plans';

    protected $fillable = [
        'name',
        'number_of_fotos',
        'content',
        'slug',
        'display_value',
        'status',
        'trial',  
        'value_monthly',
        'value_quarterly',
        'value_semestral',
        'value_semi-annual',
        'value_bianual'
    ];

    /**
     * Relationships
    */
    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    /**
     * Scopes
    */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }
}

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
        'value_semi_anual',
        'value_anual',
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

    /**
     * Accerssors and Mutators
    */
    public function setValueMonthlyAttribute($value)
    {
        $this->attributes['value_monthly'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValueMonthlyAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValueQuarterlyAttribute($value)
    {
        $this->attributes['value_quarterly'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValueQuarterlyAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValueSemiAnualAttribute($value)
    {
        $this->attributes['value_semi_anual'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValueSemiAnualAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValueAnualAttribute($value)
    {
        $this->attributes['value_anual'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValueAnualAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValueBianualAttribute($value)
    {
        $this->attributes['value_bianual'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValueBianualAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(',', '.', str_replace('.', '', $param));
    }
}

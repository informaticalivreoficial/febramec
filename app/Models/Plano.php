<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    use HasFactory;

    protected $table = 'planos';

    protected $fillable = [
        'name',
        'content',
        'status',        
        'valor_mensal',        
        'valor_trimestral',        
        'valor_semestral',        
        'valor_anual'      
    ];    

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
     * Relacionamentos
    */
    public function pedidos()
    {
        return $this->hasMany(Pedidos::class, 'plano', 'id');
    }
    

    /**
     * Accerssors and Mutators
    */
    protected function setHorarioAttribute($value)
    {
        
        $this->attributes['horario'] = (!empty($value) ? Carbon::parse($value)->format('H:i') : null);
        
    }

    public function getHorarioAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return date('H:i', strtotime($value));
    }

    public function setValorMensalAttribute($value)
    {
        $this->attributes['valor_mensal'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorMensalAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValorTrimestralAttribute($value)
    {
        $this->attributes['valor_trimestral'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorTrimestralAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValorSemestralAttribute($value)
    {
        $this->attributes['valor_semestral'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorSemestralAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return number_format($value, 2, ',', '.');
    }

    public function setValorAnualAttribute($value)
    {
        $this->attributes['valor_anual'] = (!empty($value) ? floatval($this->convertStringToDouble($value)) : null);
    }

    public function getValorAnualAttribute($value)
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

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
        'vagas',
        'status',        
        'segunda',        
        'terca',        
        'quarta',        
        'quinta',        
        'sexta',        
        'sabado',        
        'horario',        
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

    /**
     * Mutator Segunda
     *
     * @param $value
    */
    public function setSegundaAttribute($value)
    {
        $this->attributes['segunda'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Terça
     *
     * @param $value
    */
    public function setTercaAttribute($value)
    {
        $this->attributes['terca'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quarta
     *
     * @param $value
    */

    public function setQuartaAttribute($value)
    {
        $this->attributes['quarta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Quinta
     *
     * @param $value
    */

    public function setQuintaAttribute($value)
    {
        $this->attributes['quinta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sexta
     *
     * @param $value
    */

    public function setSextaAttribute($value)
    {
        $this->attributes['sexta'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    /**
     * Mutator Sábado
     *
     * @param $value
    */
    public function setSabadoAttribute($value)
    {
        $this->attributes['sabado'] = (($value === true || $value === 'on') ? 1 : 0);
    }

    private function convertStringToDouble($param)
    {
        if(empty($param)){
            return null;
        }
        return str_replace(',', '.', str_replace('.', '', $param));
    }
}

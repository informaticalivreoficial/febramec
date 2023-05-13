<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Academia extends Model
{
    use HasFactory;

    protected $table = 'academias';

    protected $fillable = [
        'name', 'plano', 'status', 'email', 'logomarca', 'metaimg', 'content', 'link',               
        'slug', 'mapa_google', 'metatags', 'views', 'dominio', 'ano_de_inicio',
        //Endereço
        'cep', 'rua', 'num', 'complemento', 'bairro', 'cidade', 'uf',
        //Contato
        'telefone', 'celular', 'whatsapp', 'skype', 'telegram',
        //Redes
        'facebook', 'twitter', 'instagram', 'linkedin', 'vimeo', 
        'youtube', 'fliccr',               
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
    public function images()
    {
        return $this->hasMany(AcademiaGb::class, 'academia', 'id')->orderBy('cover', 'ASC');
    }

    /**
     * Accerssors and Mutators
    */
    public function cover()
    {       
        if(empty($this->logomarca) || !Storage::disk()->exists($this->logomarca)) {
            return url(asset('backend/assets/images/image.jpg'));
        }
        return Storage::url($this->logomarca);
    }

    public function getmetaimg()
    {
        if(empty($this->metaimg) || !Storage::disk()->exists($this->metaimg)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->metaimg);
    }

    public function setSlug()
    {
        if(!empty($this->name)){
            $academia = Academia::where('name', $this->name)->first(); 
            if(!empty($academia) && $academia->id != $this->id){
                $this->attributes['slug'] = Str::slug($this->name) . '-' . $this->id;
            }else{
                $this->attributes['slug'] = Str::slug($this->name);
            }            
            $this->save();
        }
    }

    public function setCepAttribute($value)
    {
        $this->attributes['cep'] = (!empty($value) ? $this->clearField($value) : null);
    }
    
    public function getCepAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    }
    
    public function setTelefoneAttribute($value)
    {
        $this->attributes['telefone'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setCelularAttribute($value)
    {
        $this->attributes['celular'] = (!empty($value) ? $this->clearField($value) : null);
    }

    public function setWhatsappAttribute($value)
    {
        $this->attributes['whatsapp'] = (!empty($value) ? $this->clearField($value) : null);
    }

    private function clearField(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    }
}

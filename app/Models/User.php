<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, TenantTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tenant',
        'academy_plan', 
        'status',
        'information',
        'graduacao',
        'name', 'password', 'remember_token', 'code',
        'gender',
        'cpf',
        'rg',
        'rg_expedition',
        'birthday',
        'naturalness',
        'civil_status',
        'avatar',        
        //Address      
        'postcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',
        //Contact
        'phone', 'cell_phone', 'whatsapp', 'skype', 'telegram', 'email', 'additional_email',
        //Social
        'facebook', 'twitter', 'instagram',
        //Function
        'admin', 'client', 'editor', 'superadmin',        
        //Responsible
        'responsible_name', 'responsible_cpf', 'responsible_rg', 'responsible_phone',        
    ];    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
    */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relacionamentos
    */
    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant', 'id');
    }

    // public function posts()
    // {
    //     return $this->hasMany(Post::class, 'autor', 'id');
    // }

    // public function pedidos()
    // {
    //     return $this->hasMany(Pedidos::class, 'user', 'id');
    // }

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

    //Exibe a função do usuário
    // public function getFuncao() {
    //     if($this->admin == 1 && $this->client == 0 && $this->superadmin == 0){
    //         return 'Administrador';
    //     }elseif($this->admin == 0 && $this->client == 1 && $this->superadmin == 0){
    //         return 'Aluno';
    //     }elseif($this->admin == 0 && $this->client == 0 && $this->editor == 1 && $this->superadmin == 0){
    //         return 'Editor';
    //     }elseif($this->admin == 1 && $this->client == 1 && $this->superadmin == 0){
    //         return 'Administrador/Cliente'; 
    //     }else{
    //         return 'Super Administrador'; 
    //     }
    // }
    
    public function getCivilStatusTranslateAttribute(string $status, string $genre)
    {
        if ($genre === 'feminino') {
            if ($status === 'casado') {
                return 'casada';
            } elseif ($status === 'separado') {
                return 'separada';
            } elseif ($status === 'solteiro') {
                return 'solteira';
            } elseif ($status === 'divorciado') {
                return 'divorciada';
            } elseif ($status === 'viuvo') {
                return 'viúva';
            } else {
                return '';
            }
        } else {
            if ($status === 'masculino') {
                return 'casado';
            } elseif ($status === 'separado') {
                return 'separado';
            } elseif ($status === 'solteiro') {
                return 'solteiro';
            } elseif ($status === 'divorciado') {
                return 'divorciado';
            } elseif ($status === 'viuvo') {
                return 'viúvo';
            } else {
                return '';
            }
        }

    }

    public function getUrlAvatarAttribute()
    {
        if (!empty($this->avatar)) {
            return Storage::url($this->avatar);
        }
        return '';
    }

    // public function setCpfAttribute($value)
    // {
    //     $this->attributes['cpf'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    
    // public function getCpfAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }

    //     return
    //         substr($value, 0, 3) . '.' .
    //         substr($value, 3, 3) . '.' .
    //         substr($value, 6, 3) . '-' .
    //         substr($value, 9, 2);
    // }

    // public function setRgAttribute($value)
    // {
    //     $this->attributes['rg'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    
    // public function getRgAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }

    //     return
    //         substr($value, 0, 2) . '.' .
    //         substr($value, 2, 3) . '.' .
    //         substr($value, 5, 3) . '-' .
    //         substr($value, 8, 1);
    // }
    
    // public function setBirthdayAttribute($value)
    // {
    //     $this->attributes['birthday'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    // }
    
    // public function getBirthdayAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }
    //     return date('d/m/Y', strtotime($value));
    // }

    // public function setPostcodeAttribute($value)
    // {
    //     $this->attributes['postcode'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    
    // public function getPostcodeAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }

    //     return substr($value, 0, 5) . '-' . substr($value, 5, 3);
    // }
    
    // public function setPhoneAttribute($value)
    // {
    //     $this->attributes['phone'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    //Formata o telefone para exibir
    // public function getPhoneAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }
    //     return  
    //         substr($value, 0, 0) . '(' .
    //         substr($value, 0, 2) . ') ' .
    //         substr($value, 2, 4) . '-' .
    //         substr($value, 6, 4) ;
    // }
    
    // public function setCellPhoneAttribute($value)
    // {
    //     $this->attributes['cell_phone'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    //Formata o celular para exibir
    // public function getCellPhoneAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }
    //     return  
    //         substr($value, 0, 0) . '(' .
    //         substr($value, 0, 2) . ') ' .
    //         substr($value, 2, 5) . '-' .
    //         substr($value, 7, 4) ;
    // }
    
    // public function setWhatsappAttribute($value)
    // {
    //     $this->attributes['whatsapp'] = (!empty($value) ? $this->clearField($value) : null);
    // }
    //Formata o celular para exibir
    // public function getWhatsappAttribute($value)
    // {
    //     if (empty($value)) {
    //         return null;
    //     }
    //     return  
    //         substr($value, 0, 0) . '(' .
    //         substr($value, 0, 2) . ') ' .
    //         substr($value, 2, 5) . '-' .
    //         substr($value, 7, 4) ;
    // }

    public function setPasswordAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['password']);
            return;
        }
        $this->attributes['code'] = $value;
        $this->attributes['password'] = bcrypt($value);
    } 

    public function setAdminAttribute($value)
    {
        $this->attributes['admin'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setEditorAttribute($value)
    {
        $this->attributes['editor'] = ($value === true || $value === 'on' ? 1 : 0);
    }

    public function setClientAttribute($value)
    {
        $this->attributes['client'] = ($value === true || $value === 'on' ? 1 : 0);
    }
    
    public function setSuperAdminAttribute($value)
    {
        $this->attributes['superadmin'] = ($value === true || $value === 'on' ? 1 : 0);
    }
    
    public function setRememberTokenAttribute($value)
    {
        if (empty($value)) {
            unset($this->attributes['remember_token']);
            return;
        }
        $this->attributes['remember_token'] = bcrypt($value);
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return null;
        }

        return date('d/m/Y', strtotime($value));
    }

    // private function convertStringToDouble(?string $param)
    // {
    //     if (empty($param)) {
    //         return null;
    //     }

    //     return str_replace(',', '.', str_replace('.', '', $param));
    // }
    
    // private function convertStringToDate(?string $param)
    // {
    //     if (empty($param)) {
    //         return null;
    //     }
    //     list($day, $month, $year) = explode('/', $param);
    //     return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    // }
    
    // private function clearField(?string $param)
    // {
    //     if (empty($param)) {
    //         return null;
    //     }
    //     return str_replace(['.', '-', '/', '(', ')', ' '], '', $param);
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TenantGb extends Model
{
    use HasFactory;

    protected $table = 'tenant_gbs'; 

    protected $fillable = [
        'tenant',
        'path',
        'cover'
    ];

    /**
     * Accerssors and Mutators
    */
    public function getUrlImageAttribute()
    {
        return Storage::url($this->path);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AcademiaGb extends Model
{
    use HasFactory;

    protected $table = 'academia_gbs'; 

    protected $fillable = [
        'academia',
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'uuid',
        'social_name',
        'alias_name',
        'status',
        'init_date',
        'slug',
        'cnpj',
        'ie',
        'domain',
        'subdomain',
        'template',
        'template_exclusive',
        //Images
        'logo', 'logo_admin', 'logo_footer', 'favicon', 'metaimg', 'imgheader', 'watermark',
        //Contact
        'phone', 'cell_phone', 'whatsapp', 'skype', 'telegram', 'email', 'additional_email',
        //Address
        'postcode', 'street', 'number', 'complement', 'neighborhood', 'state', 'city',
        //Social links
        'facebook', 'twitter', 'instagram', 'youtube', 'linkedin',
        //SEO
        'information', 'privacy_policy', 'metatags', 'maps_google',
        'analytics_id',
        'rss',
        'rss_data',
        'sitemap',
        'sitemap_data',
        'views',
    ];

    /**
     * Relationships
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

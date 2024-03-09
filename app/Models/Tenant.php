<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

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

    public function images()
    {
        return $this->hasMany(TenantGb::class, 'tenant', 'id')->orderBy('cover', 'ASC');
    }

    /**
     * Accerssors and Mutators
     */
    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']);

        if(!$cover) {
            $images = $this->images();
            $cover = $images->first(['path']);
        }

        if(empty($cover['path']) || !Storage::disk()->exists($cover['path'])) {
            return url(asset('backend/assets/images/image.jpg'));
        }

        return Storage::url($cover['path']);
    }
}

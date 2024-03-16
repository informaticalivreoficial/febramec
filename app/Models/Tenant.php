<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tenants';

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
    public function getmetaimg()
    {
        if(empty($this->metaimg) || !Storage::disk()->exists($this->metaimg)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->metaimg);
    }
    
    public function getlogo()
    {
        if(empty($this->logo) || !Storage::disk()->exists($this->logo)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->logo);
    }
    
    public function getlogoadmin()
    {        
        if(empty($this->logo_admin) || !Storage::disk()->exists($this->logo_admin)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->logo_admin);
    }
    
    public function getfaveicon()
    {
        if(empty($this->favicon) || !Storage::disk()->exists($this->favicon)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->favicon);
    }
    
    public function getwatermark()
    {
        if(empty($this->watermark) || !Storage::disk()->exists($this->watermark)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->watermark);
    }
    
    public function getimgheader()
    {
        if(empty($this->imgheader) || !Storage::disk()->exists($this->imgheader)) {
            return url(asset('backend/assets/images/image.jpg'));
        } 
        return Storage::url($this->imgheader);
    }

    public function setSlug()
    {
        if(!empty($this->name)){
            $tenant = Tenant::where('name', $this->name)->first(); 
            if(!empty($tenant) && $tenant->id != $this->id){
                $this->attributes['slug'] = Str::slug($this->name) . '-' . $this->id;
            }else{
                $this->attributes['slug'] = Str::slug($this->name);
            }            
            $this->save();
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name','logo_path','primary_phone','secondary_phone','support_email',
        'address_line1','address_line2','city','state','pincode',
        'map_embed_url','footer_about','footer_text','social_links','web3forms_key'
    ];

    protected $casts = [
        'social_links' => 'array',
    ];

    public function navigationLinks()
    {
        return $this->hasMany(NavigationLink::class);
    }
}

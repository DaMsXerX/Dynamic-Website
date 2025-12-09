<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug','title','subtitle','description','primary_image',
        'background_image','badge_text','cta_label','cta_url','theme', 'highlight_text',
    'highlight_blue'
    ];

    public function tables()
    {
        return $this->hasMany(HeroTable::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarInfo extends Model
{
     protected $fillable = [
        'page_slug',
        'title',
        'description',
        'call_heading',
        'call_number',
        'icon_url',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MissionVision extends Model
{
    protected $fillable = [
        'page_slug',
        'mission_title',
        'mission_description',
        'vision_title',
        'vision_description',
    ];
}

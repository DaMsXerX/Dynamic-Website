<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroTable extends Model
{
     use HasFactory;

    protected $fillable = ['hero_id','capacity','central','state','total','order'];

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }
}

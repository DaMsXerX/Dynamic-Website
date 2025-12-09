<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationLink extends Model
{
     use HasFactory;

    protected $fillable = ['settings_id','label','url','order','is_primary'];

    public function setting()
    {
        return $this->belongsTo(Setting::class);
    }
}

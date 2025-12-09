<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProcessStep extends Model
{
      protected $fillable = [
        'title',
        'description',
        'order',
        'page_slug',
    ];
}

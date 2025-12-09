<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletList extends Model
{
    use HasFactory;

    protected $fillable = ['section_slug','text','order'];

}

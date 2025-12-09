<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMSubsidy extends Model
{
    protected $fillable = [
        'capacity',
        'amount',
        'note',
    ];
}

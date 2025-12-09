<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubsidyRow extends Model
{
    use HasFactory;

    protected $fillable = ['section_slug','capacity','central_subsidy','state_subsidy','total_subsidy','order'];
}

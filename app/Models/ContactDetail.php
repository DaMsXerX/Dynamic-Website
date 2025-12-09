<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactDetail extends Model
{
    protected $fillable = [
    'title',
    'description',
    'phone_heading',
    'phone_value',
    'email_heading',
    'email_value',
    'address_heading',
    'address_value',
    'map_embed_url',
];
}

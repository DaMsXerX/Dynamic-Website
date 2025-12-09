<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHeading extends Model
{
        protected $fillable = [
        'page_slug',
        'section_slug',
        'heading',
        'highlight_text',
        'extra_heading',     // NEW FIELD
        'subheading',
        'order',
    ];
}

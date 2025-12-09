<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntroSection extends Model
{
    protected $fillable = [
        'heading',
        'highlight_text',
        'paragraph1',
        'paragraph2',
        'button_text',
        'button_link',
        'button_bg_color',
        'button_text_color',
        'image',
        'footer_text',
    ];
}

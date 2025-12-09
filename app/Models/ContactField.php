<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactField extends Model
{
    use HasFactory;

    protected $fillable = ['contact_form_id','label','type','is_required','order','options'];

    public function form()
    {
        return $this->belongsTo(ContactForm::class, 'contact_form_id');
    }

    protected $casts = [
        'is_required' => 'boolean',
    ];
}

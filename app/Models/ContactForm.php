<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','success_message','receiver_email','enable_web3forms','web3forms_key'];

    protected $casts = [
        'enable_web3forms' => 'boolean',
    ];

    public function fields()
    {
        return $this->hasMany(ContactField::class);
    }
}

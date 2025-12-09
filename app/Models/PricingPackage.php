<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
    use HasFactory;

    protected $fillable = ['plan_name','price_label','is_featured','cta_label','cta_url','order'];

    public function features()
    {
        return $this->hasMany(PricingFeature::class);
    }
}

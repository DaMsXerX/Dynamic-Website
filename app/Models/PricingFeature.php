<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingFeature extends Model
{
    use HasFactory;

    protected $fillable = ['pricing_package_id','description','order'];

    public function package()
    {
        return $this->belongsTo(PricingPackage::class, 'pricing_package_id');
    }
}

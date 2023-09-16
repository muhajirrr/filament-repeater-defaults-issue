<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerType extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productPrices(): HasMany
    {
        return $this->hasMany(ProductPrice::class, 'customer_type_id');
    }
}

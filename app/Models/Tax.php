<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = [
        'tax_type',
        'tax_code',
        'tax_rate',
        'tax_fixed',
        'tax_description',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}

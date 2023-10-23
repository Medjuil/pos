<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'code',
        'barcode',
        'cost',
        'markup',
        'fixed_markup',
        'stock',
        'unit',
        'unit_value',
        'expiration_date',
        'description',
        'shop_id',
        'tax_id',
        'product_category_id',
    ];

    public function shop(): BelongsTo {
        return $this->belongsTo(Shop::class);
    }

    public function tax(): BelongsTo {
        return $this->belongsTo(Tax::class);
    }

    public function product_category(): BelongsTo {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product_files(): HasMany {
        return $this->hasMany(ProductFile::class);
    }

    public function order_details(): HasMany {
        return $this->hasMany(OrderDetail::class);
    }
}

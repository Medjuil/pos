<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'discount', // paid, unpaid
    ];

    public function products(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}

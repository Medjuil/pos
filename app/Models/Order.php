<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'user_id',
        'customer_id',
        'payment_gateway_id',
        'order_date',
        'active', // paid, unpaid
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    public function payment_gateway(): BelongsTo {
        return $this->belongsTo(PaymentGateway::class);
    }

    public function order_details(): HasMany {
        return $this->hasMany(OrderDetail::class);
    }
}

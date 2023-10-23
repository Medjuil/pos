<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'country',
        'region',
        'district',
        'province_state',
        'municipality_city',
        'barangay',
        'street_name',
        'building_no',
        'postal_code',
        'plot_identification',
    ];

    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
    
    public function customers(): HasMany {
        return $this->hasMany(Customer::class);
    }

    public function shops(): HasMany {
        return $this->hasMany(Shop::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'city',
        'postcode',
        'country',
        'order_number',
        'total_price',
        'payment_method',
        'status',
        'notes',
        'paid',
        'paid_when',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot(['quantity', 'price', 'total'])
            ->withTimestamps();
    }


}

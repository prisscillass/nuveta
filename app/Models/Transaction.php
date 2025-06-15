<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'payment_method',
        'subtotal',
        'shipping_cost',
        'total',
        'expediton',
        'status',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function cartItem(): BelongsTo
    {
        return $this->belongsTo(CartItem::class, 'cart_id');
    }
}

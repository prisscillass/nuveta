<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'payment_method',
        'total',
        'expedition',
        'status',
        'created_at',
        'updated_at'
    ];

    public function transactionItem() {
        return $this->hasMany(TransactionItem::class, 'transaction_id', 'id');
    }
}

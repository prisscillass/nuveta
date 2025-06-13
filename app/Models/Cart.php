<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
<<<<<<<<< Temporary merge branch 1
        'product_name',
        'size',
        'quantity',
        'price'
=========
        'user_id'
>>>>>>>>> Temporary merge branch 2
    ];
}

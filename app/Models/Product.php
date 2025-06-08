<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category',
        'name',
        'price',
        'brand',
        'stock',
        'size',
        'condition',
        'img_url'
    ];
}

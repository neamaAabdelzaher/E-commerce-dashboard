<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[

        'name_ar',
        'name_en',
        'status',
        'code',
        'price',
        'quantity',
        'image',
        'des_ar',
        'des_en',
        'brand_id',
        'sub_category_id',
    ];
}

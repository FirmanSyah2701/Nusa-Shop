<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'product_code';
    protected $fillable   = [
        'product_code', 'name_product', 'photo', 'price', 'qty'
    ];

    public $increments = false;
    public $timestamps = false;
}

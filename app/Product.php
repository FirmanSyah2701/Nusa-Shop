<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_code';
    protected $fillable   = [
        'product_code', 'product_name', 'photo', 'price', 
        'qty', 'weight', 'description', 'category_id'
    ];

    protected $keyType = 'string';

    public $increments = false;
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}

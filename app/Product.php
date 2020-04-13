<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'product_code';
    protected $fillable   = [
        'product_code', 'product_name', 'photo', 'price', 'qty', 'description', 'category_id'
    ];

    public $increments = false;
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
}

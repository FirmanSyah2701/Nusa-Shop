<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    
    protected $fillable = [
        'cart_id', 'customer_id', 'product_code', 'qty', 'status'
    ];

    public $timestamps = false;

    public function customer(){
        return $this->hasOne('App\Customer', 'customer_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_code');
    }
}

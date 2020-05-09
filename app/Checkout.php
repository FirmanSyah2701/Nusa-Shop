<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'checkout_id';
    protected $fillable   = [
        'product_code', 'city_id', 'courier', 'customer_name', 
        'full_address', 'total_price'
    ];

    public $timestamps = false;

    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_code');
    }
}

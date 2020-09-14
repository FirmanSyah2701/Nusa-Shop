<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'checkout_id';
    protected $fillable   = [
        'customer_id', 'city_id', 'courier', 'customer_name', 
        'full_address', 'number_phone', 'total_price', 
        'service', 'etd'
    ];

    public $timestamps = false;

    public function customer(){
        return $this->hasOne('App\Customer', 'customer_id');
    }

    public function city(){
        return $this->hasOne('App\City', 'city_id');
    }

    public function payment(){
        return $this->hasOne('App\Payment', 'checkout_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payemnt';
    protected $primaryKey = 'payemnt_id';
    protected $fillable   = [
        'payment_id', 'photo', 'customer_id', 'checkout_id', 'validation_id'
    ];

    public $timestamps = false;
    
    public function customer(){
        return $this->belongsTo('App\Customer', 'customer_id');
    }

    public function checkout(){
        return $this->belongsTo('App\Checkout', 'checkout_id');
    }

    public function validation(){
        return $this->belongsTo('App\Validation', 'validation_id');
    }

}

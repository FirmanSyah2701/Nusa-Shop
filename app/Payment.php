<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $primaryKey = 'payment_id';
    protected $fillable   = [
        'payment_id', 'photo', 'checkout_id', 'validation_id', 'date'
    ];
    
    public $timestamps = false;

    public function checkout(){
        return $this->belongsTo('App\Checkout', 'checkout_id');
    }

    public function validation(){
        return $this->belongsTo('App\Validation', 'validation_id');
    }
    
}

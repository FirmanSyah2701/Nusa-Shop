<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'income_id';
    protected $fillable = ['income_id', 'capital_id', 'payment_id'];

    
    public function capital(){
        return $this->hasOne('App\Capital');
    }

    public function payment(){
        return $this->hasOne('App\Payment');
    }
    
}

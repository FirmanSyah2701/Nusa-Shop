<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_id', 'password', 'name', 'number_phone', 'address_id'
    ];

    public $timestamps = false;

    public function address(){
        return $this->belongsTo('App\Address', 'address_id');
    }
}

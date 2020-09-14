<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table      = 'city';
    protected $fillable   = 
    [
        'city_id', 'province_id', 'type', 'city_name', 'postal_code'
    ];

    protected $primaryKey = 'city_id';
    
    public $timestamps = false;

    public function province(){
       return $this->hasOne('App\Province', 'province_id');
    }

    public function checkout(){
        return $this->belongsTo('App\Checkout', 'city_id');
    }
}

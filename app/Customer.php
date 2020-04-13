<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    
    protected $fillable = [
        'customer_id', 'username', 'password', 'name', 'number_phone', 'address_id'
    ];

    public $timestamps = false;

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function address(){
        return $this->belongsTo('App\Address', 'address_id');
    }
}

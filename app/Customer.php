<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Customer extends Authenticatable
{
    
    use Notifiable;
    
    protected $fillable = [
        'customer_id', 'username', 'password', 'name', 'number_phone',
    ];

    protected $hidden = [
        'password',
    ];

    public $timestamps = false;

     public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function cart(){
        return $this->belongsTo('App\Cart');
    }
}

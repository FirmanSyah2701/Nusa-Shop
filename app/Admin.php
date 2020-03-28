<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    protected $fillable = [
        'username', 'name', 'password'
    ];

    protected $primaryKey = 'username';
    public $increments = false;
    
    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}

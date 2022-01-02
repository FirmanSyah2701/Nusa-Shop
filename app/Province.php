<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table      = 'province';
    protected $primaryKey = 'province_id';
    protected $fillable   = ['province_id', 'province'];

    public $timestamps = false;

    public function city(){
        return $this->belongsTo('App\City', 'province_id');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $table      = 'cost';
    protected $primaryKey = 'cost_id';
    protected $fillable   = [
        'cost_id', 'origin', 'destination', 'weight', 'courier'
    ];

    public $timestamps = false;

    public function courier(){
        return $this->belongsTo('App\Courier', 'courier_id');
    }
}

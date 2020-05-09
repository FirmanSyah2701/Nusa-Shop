<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    protected $primaryKey = 'validation_id';
    protected $fillable   = [
        'validation_id', 'status'
    ];

    public $timestamps = false;
}

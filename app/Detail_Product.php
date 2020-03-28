<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_lProduct extends Model
{
    protected $table      = 'dtlproduct';
    protected $primaryKey = 'dtlproduct_id';
    protected $fillable   = [
        'dtlproduct_id', 'description', 'product_code'
    ];

    public $timestamps = false;
}

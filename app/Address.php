<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'address_id';
    protected $fillable = [
        'address_id', 'postal_code', 'province', 'city', 'subdistrict', 'full_address'
    ];

    public $timestamps = false;
}

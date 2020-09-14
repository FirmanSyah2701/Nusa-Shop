<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey = 'category_id';
    protected $fillable   = [
        'category_id', 'category_name'
    ];

    public $timestamps = false;
    
    public function product(){
        return $this->hasOne('App\Product', 'category_id');
    }
    
}

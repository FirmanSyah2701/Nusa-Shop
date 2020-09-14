<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $table = 'capital';
    protected $primaryKey = 'capital_id';
    protected $fillable = ['capital_id', 'capital', 'date'];

    public $timestamps = false;
    
    /* protected $dateFormat = 'd-m-Y';

    public function setDateAttribute($value){
        $this->attribute['date'] = (new Carbon($value))->format('d/m/y');
    } */

    public function income(){
        return $this->belongsTo('App\Income');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ProductMainClass extends Model
{

    // use SoftDeletes;

    protected $fillable = [
        'mainClassName', 'sort'
    ];

    public function productClass()
    {
        return $this->hasMany('App\ProductClass');
        
    }

}

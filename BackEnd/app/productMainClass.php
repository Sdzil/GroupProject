<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMainClass extends Model
{

    protected $fillable = [
        'mainClassName', 'sort'
    ];

    public function productClass()
    {
        return $this->hasMany('App\ProductClass');
    }

}

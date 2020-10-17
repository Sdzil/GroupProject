<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productMainClass extends Model
{

    protected $fillable = [
        'mainClassName', 'sort'
    ];

    public function productType()
    {
        return $this->hasMany('App\ProductClass');
    }

}

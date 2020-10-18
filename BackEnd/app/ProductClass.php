<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
    protected $fillable = [
        'className', 'sort', 'product_main_class_id'
    ];

    public function productMainClass()
    {
        return $this->belongsTo('App\ProductMainClass');
    }

    public function productType()
    {
        return $this->hasMany('App\ProductType');
    }
}

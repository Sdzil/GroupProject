<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = [
        'typeName', 'sort', 'product_class_id'
    ];

    public function productClass()
    {
        return $this->belongsTo('App\ProductClass');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}

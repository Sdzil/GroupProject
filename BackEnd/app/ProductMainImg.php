<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMainImg extends Model
{
    protected $fillable = [
        'imageUrl', 'sort', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function productInfoImg()
    {
        return $this->hasMany('App\ProductInfoImg');

    }
}

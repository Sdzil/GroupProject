<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'productName', 'price', 'productInfo', 'content', 'sort', 'stockType', 'product_type_id'
    ];

    public function productType()
    {
        return $this->belongsTo('App\ProductType');
    }

    public function productMainImg()
    {
        return $this->hasMany('App\ProductMainImg');
    }

    public function stock()
    {
        return $this->hasMany('App\Stock');
    }

    // public function event_product_intermediary()
    // {
    //     return $this->hasMany('App\EPintermediary');
    // }

    // public function orderProduct()
    // {
    //     return $this->hasMany('App\OrderProduct');
    // }

}


// {'s':'3','l':'5', 'xl':'1', '500ml':'2'}

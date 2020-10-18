<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInfoImg extends Model
{
    protected $fillable = [
        'imageUrl', 'sort', 'product_main_img_id'
    ];

    public function productMainImg()
    {
        return $this->belongsTo('App\productMainImg');
    }

}

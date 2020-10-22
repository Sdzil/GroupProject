<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'size', 'amount', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}

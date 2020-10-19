<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'imageUrl', 'description', 'target', 'link', 'sort'
    ];
}

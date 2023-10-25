<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    function meta():HasOne{
        return $this->hasOne(Product_meta::class,'product_id','id');
    }
    function url(){
        return route('product.single',[$this->id]);
    }
}

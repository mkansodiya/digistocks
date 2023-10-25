<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as P;
class Product extends Controller
{
    function product_single($id){
        $product= P::find($id);
        return $this->view(view('product_single',['product'=>$product]));
    }
}

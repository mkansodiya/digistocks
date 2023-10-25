<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Home extends Controller
{
    function index(){
        $latest=Product::orderBy('id','DESC')->take(12)->get();
        return $this->view(view('home',['latest'=>$latest]));
    }
}

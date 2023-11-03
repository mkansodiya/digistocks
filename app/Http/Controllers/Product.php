<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product as P;
use App\Http\Controllers\Cart;
class Product extends Controller
{
    function product_single($id){
        $product= P::find($id);
        return $this->view(view('product_single',['product'=>$product]));
    }
    function cart_page(Request $req){
        $user=$req->user();
        $cartId=session('cart_id');
        $userId=0;
        if($user!=null){
            $userId=$user->id;
            $cart=\App\Models\Cart::where('user_id',$userId)->first();
            if($cart!=null){
                $cartId=$cart->id;
            }
        }
        $cartItems=\App\Models\Cart_item::where('cart_id',$cartId)->get();
       
        return $this->view(view('cart',['cartItems'=>$cartItems]));
    }
    function add_to_cart(Request $req){
        $productId=$req->id;
        $product=P::find($productId);
        if($product==null){
            return redirect()->back();
        }
        $qty=$req->qty;
        if($qty<1){
            $qty=1;
        }
        $user=$req->user();
        $userId=0;
        $cartId=session('cart_id');
        if($user!=null){
            $userId=$user->id;
            $cart=\App\Models\Cart::where('user_id',$userId)->first();
            if($cart!=null){
                $cartId=$cart->id;
            }
        }
        $cart=Cart::add_to_cart(['cart_id'=>$cartId,'product_id'=>$product->id,'user_id'=>$userId,'qty'=>$qty]);
        if($cart->status=="SUCCESS"){
            $cart_item=$cart->cart_item;
            $req->session()->put('cart_id',$cart_item->cart_id);
        }
        $msg=$cart->msg;
        return redirect()->back()->with(['msg'=>['content'=>$msg,'status'=>$cart->status]]);
        return $req->all();
    }
}

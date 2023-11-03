<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart as Cartmodel;
use App\Models\Cart_item;
class Cart extends Controller
{
    static function add_to_cart(Array $cartData){
        $userId=$cartData['user_id']??0;
        $cartId=$cartData['cart_id']??0;
        $product_id=$cartData['product_id']??0;
        $qty=$cartData['qty']??1;
        if($qty<1){
            $qty=1;
        }
        if($product_id==0){
            return (object)['status'=>'ERROR','msg'=>'Invalid product id'];
        }
        $product=Product::find($product_id);
        if($product==null){
            return (object)['status'=>'ERROR','msg'=>'Invalid product id'];
        }
        $cartTotal=0;
        $cart=Cartmodel::find($cartId);
        if($cart==null){
            $cart=Cartmodel::create([
                'user_id'=>$userId,
                'cart_total'=>$cartTotal,
                'cart_currency'=>1
            ]);
        }
        $cartId=$cart->id;
        $meta=$product->meta;
        $itemTotal=$meta->min_price*$qty;
        $cartTotal=$cart->cart_total+$itemTotal;

        $cart->cart_total=$cartTotal;
        $cart->save();

        $cartItem=Cart_item::where(['product_id'=>$product_id,'cart_id'=>$cartId])->first();
        $new=false;
        if($cartItem==null){
            $new=true;
            $cartItem=Cart_item::create([
                'cart_id'=>$cartId,
                'product_id'=>$product_id,
                'max_price'=>$meta->max_price,
                'min_price'=>$meta->min_price,
                'qty'=>$qty,
                'total_amount'=>$itemTotal
            ]);
        }
        if($new==false){
            $qty=$cartItem->qty+$qty;
            $itemTotal=$qty*$meta->min_price;
            
            $cartItem->qty=$qty;
            $cartItem->total_amount=$itemTotal;
            $cartItem->max_price=$meta->max_price;
            $cartItem->min_price=$meta->min_price;
            $cartItem->save();
        }
        return (object)['status'=>'SUCCESS','msg'=>'item added to the cart','cart_item'=>$cartItem,'cart'=>$cart];
    }
}

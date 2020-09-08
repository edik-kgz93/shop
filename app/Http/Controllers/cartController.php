<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function adtocartAction(Request $request){
        if($request->input('id')){
            $id=$request->input('id');
            $quantity=$request->input('form_quantity');
            $cart_id=DB::select('SELECT product_id FROM cart');

            $test=true;
            foreach ($cart_id as $product){
                if($product->product_id==$id){
                    $test=false;
                }
            }
            if($test){
                DB::select('INSERT INTO cart(product_id,quantity) VALUES (:product_id,:quantity)',['product_id'=>$id, 'quantity'=>$quantity]);
            }
        }
        $cart_products=DB::select('SELECT collection.name, collection.price, collection.id, cart.quantity FROM cart LEFT JOIN collection ON collection.id = cart.product_id;');
        $allsum=0;
        foreach ($cart_products as $sum){
            $sum=$sum->price*$sum->quantity;
            $allsum=$allsum+$sum;
        }
        return view('/cart',['cart_products'=>$cart_products, 'allsum'=>$allsum]);
    }

    public function minusformAction(Request $request){
        if($request->input('cart_minus_form_id')){
            $id=$request->input('cart_minus_form_id');
            $form_quantity=$request->input('form_quantity');
            if($form_quantity>1){
            DB::select('UPDATE cart SET quantity=:quantity WHERE product_id=:cart_id',['quantity'=>$form_quantity-1, 'cart_id'=>$id]);
            }
        }
        return redirect('/cart');
    }

    public function plusformAction(Request $request){
        if($request->input('cart_plus_form_id')){
            $id=$request->input('cart_plus_form_id');
            $form_quantity=$request->input('cart_form_quantity');
            $quantity=$form_quantity+1;
            DB::select('UPDATE cart SET quantity=:quantity WHERE product_id=:cart_id',['quantity'=>$quantity, 'cart_id'=>$id]);
        }
        return redirect('/cart');
    }

    public function deleteformAction(Request $request){
        if($request->input('cart_delete_form_id')){
            $id=$request->input('cart_delete_form_id');
            DB::select('DELETE FROM cart WHERE product_id=:delete_id',['delete_id'=>$id]);
        }
        return redirect('/cart');
    }
}

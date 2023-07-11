<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Session;

use Validator;

class Carts extends Controller
{
    function addcart(Request $request,$id){
        $username = $request->session()->get('username');

        $user = User::all()->where('username',$username)->first();
        $user_id = $user->id;
        $product_id = $id;
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->save();
        return redirect('productlist')->with('success','Product has been Added in Cart successfully');

    }
    function cartlist(Request $request)
    {
        $username = $request->session()->get('username');

        $user = User::all()->where('username',$username)->first();
        $user_id = $user->id;
        $Cartdata = DB::table('carts')
        ->leftjoin('products', 'products.id', '=', 'carts.product_id')
        ->select('carts.id as cartId','carts.qty as qty', 'products.product_name as product_name','products.our_price as prices')
        ->where('user_id', $user_id)
        ->get();
        return view("products/cartlist", compact('Cartdata'));
    }
    function qtyIncr(Request $request,$id)
    {

           $cart = Cart::find($id);
           $cart->qty = $cart->qty+1;
           $cart->update();

           return redirect("cartlist")->with('success','Cart updated successfully');
    }
    function qtyDecr(Request $request,$id)
    {

        $cart = Cart::find($id);
        $cart->qty = $cart->qty-1;
        $cart->update();

        return redirect("cartlist")->with('success','Cart updated successfully');
    }
    function removeItem(Request $request,$id)
    {

        $cart = Cart::find($id);
        $cart->delete();

        return redirect("cartlist")->with('success','Cart Item Deleted successfully');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Session;
use PDF;
use Validator;
class Orders extends Controller
{
    function order(Request $request)
    {
        $username = $request->session()->get('username');

        $user = User::all()->where('username',$username)->first();
        $user_id = $user->id;
        $Cartdata = DB::table('carts')
        ->leftjoin('products', 'products.id', '=', 'carts.product_id')
        ->select('carts.id as cartId','carts.qty as qty', 'products.product_name as product_name','products.our_price as prices')
        ->where('user_id', $user_id)
        ->get();
        return view("products/order", compact('Cartdata'));
    }
    function orderplace(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email'=> 'required',
            'mobile_no'=> 'required|numeric|digits:10',
            'Address'=> 'required',
            'City'=> 'required',
            'State'=> 'required',
            'Country'=> 'required',
            'pincode'=> 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }else{
                $username = $request->session()->get('username');
                $user = User::all()->where('username',$username)->first();
                $user_id = $user->id;
                $order_id = random_int(100000, 999999);
                $order = new Order();
                $order->user_id = $user_id;
                $order->order_id = $order_id;
                $order->grandTotal = $request->input('grandTotal');
                $order->fullname = $request->input('fullname');
                $order->email = $request->input('email');
                $order->mobile_no = $request->input('mobile_no');
                $order->Address = $request->input('Address');
                $order->City =  $request->input('City');
                $order->State =  $request->input('State');
                $order->Country =  $request->input('Country');
                $order->pincode =  $request->input('pincode');
                $order->save();
                Session::flash('success', 'User Insert has been  successfully.');
                return redirect('dashboard');
        }
    }
    function orderlist(Request $request)
    {
        $username = $request->session()->get('username');

        $user = User::all()->where('username',$username)->first();
        $user_id = $user->id;
        $orderData = Order::all()->where('user_id',$user_id);

        return view("products/orderlist", compact('orderData'));
    }

    public function generatePDF(Request $request,$order_id)
    {
        $username = $request->session()->get('username');

        $user = User::all()->where('username',$username)->first();
        $user_id = $user->id;
        $Cartdata = DB::table('carts')
        ->leftjoin('products', 'products.id', '=', 'carts.product_id')
        ->select('carts.id as cartId','carts.qty as qty', 'products.product_name as product_name','products.our_price as prices')
        ->where('user_id', $user_id)
        ->get();
        $orderData = Order::all()->where('order_id',$order_id)->first();
        $data = [
            'title' => 'Welcome to Arj-Shopping ',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('myPDF', ['data'=>$data,'Cartdata'=>$Cartdata,'orderData'=>$orderData]);

        return $pdf->download('arjshopping.pdf');
    }
}

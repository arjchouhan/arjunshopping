<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Validator;

class Products extends Controller
{
    function addproduct(){
        return view("products/addproduct");
    }
    
    function insertproduct(Request $request){
       
            $validator = Validator::make($request->all(), [
                'prod_image' => 'required',
                    'product_name'=> 'required',
                    'price'=> 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $prod_image = [];
                if($request->hasfile('prod_image'))
                {

                    foreach($request->file('prod_image') as $file)
                    {
                        $name = time().rand(1,50).'.'.$file->getClientOriginalName();
                        $file->move(public_path('assets/productImg'), $name);  
                        $prod_image[] = 'productImg/'.$name;  
                        
                    }
                     // Save the image paths in the database
                   
                    $multiImage =  implode(',', $prod_image);
                   
                }
               
                $product= new Product();
                $product->product_name =  $request->input('product_name');
                $product->title =  $request->input('title');
                $product->sort_desc =  $request->input('sort_desc');
                $product->desc = $request->input('desc');
                $product->MRP =  $request->input('MRP');
                $product->price =  $request->input('price');
                $product->prod_image =  $multiImage;
                $product->our_price =  $request->input('our_price');
                $product->save();
                return redirect('productlist')->with('success','Product Added successfully');
            }
    }

    function editproduct($id, Request $request){
        $productData = Product::find($id);
        return view("products/editproduct", compact('productData'));
    }
    function productDetail($id, Request $request){
        $productDetail = Product::find($id);
        return view("products/productDetail", compact('productDetail'));
    }

    function update_product(Request $request,$id){
       
        $validator = Validator::make($request->all(), [
           'product_name' => 'required',
           'price'=> 'required'
       ]);

       if ($validator->fails()) {
           return redirect()->back()
                       ->withErrors($validator)
                       ->withInput();
       }else{

            $prod_image = [];
            if($request->hasfile('prod_image'))
            {

                foreach($request->file('prod_image') as $file)
                {
                    $name = time().rand(1,50).'.'.$file->getClientOriginalName();
                    $file->move(public_path('assets/productImg'), $name);  
                    $prod_image[] = 'productImg/'.$name;  
                    
                }
                // Save the image paths in the database
            
                $multiImage =  implode(',', $prod_image);
            
            }
           $product = Product::find($id);
           $product->product_name =  $request->input('product_name');
           $product->title =  $request->input('title');
           $product->sort_desc =  $request->input('sort_desc');
           $product->desc = $request->input('desc');
           $product->MRP =  $request->input('MRP');
           $product->price =  $request->input('price');
           $product->our_price =  $request->input('our_price');
           $product->prod_image =  $multiImage;
           $product->update();

           return redirect('productlist')->with('success','Product updated successfully');
       }
   }

    function productlist(){
        $products = Product::all()->where('is_deleted','N');
       
        return view("products/productlist", compact('products'));
       
    }

    function deleteproduct(Request $request, $id){
        $userData = Product::find($id);
        $userData->is_deleted = 'Y';
        $userData->save();
        return redirect('productlist')->with('success','Product deleted successfully');;
    }
}

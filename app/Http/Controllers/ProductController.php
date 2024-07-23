<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        $products = Product::all()->toArray();
        return response()->json(['data'=>$products,'status'=>'200','message'=>'Data Sended Successfully']);
    }

    public function Store(Request $request){
        $product = [
            'product_title'=>isset($request->product_title) ? $request->product_title : '',
            'product_description'=>isset($request->product_description) ? $request->product_description : '' ,
            'product_price'=>isset($request->product_price) ? $request->product_price : ''
        ];
        $product = Product::create($product);
        return response()->json(['data'=>$product,'status'=>'201','message'=>'Data Created Successfully']);
    }
    public function Show($id){
        $product = Product::find($id);
        return response()->json(['data'=>$product,'status'=>'200','message'=>'Data Sended Successfully']);
        }
    public function update(Request $request,$id){
        $product = [
            'product_title'=>isset($request->product_title) ? $request->product_title : '',
            'product_description'=>isset($request->product_description) ? $request->product_description : '' ,
            'product_price'=>isset($request->product_price) ? $request->product_price : ''
        ];
        $updateproduct = Product::where('id',$id)->update($product);
        return response()->json(['data'=>$product,'status'=>'201','message'=>'Data Updated Successfully']);
    }
    public function delete(Request $request,$id){
        $product = [
            'product_title'=>isset($request->product_title) ? $request->product_title : '',
            'product_description'=>isset($request->product_description) ? $request->product_description : '' ,
            'product_price'=>isset($request->product_price) ? $request->product_price : ''
        ];
        $product = Product::destroy($id);
        return response()->json(['data'=>[],'status'=>'200','message'=>'Data Deleted Successfully']);
    }
}

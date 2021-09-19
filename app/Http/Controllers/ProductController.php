<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(){
        $data = Product::all();
        return view('product', ['products'=>$data]);
    }
    function details($id){
        $productDetails = Product::find($id);
        return view('details',['product'=> $productDetails]);
    }
}

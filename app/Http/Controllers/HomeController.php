<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $data = Product::all();
        return view('Home.home', ['products'=>$data]);
    }
}

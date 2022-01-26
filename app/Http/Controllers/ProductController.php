<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    function details($id){
        $productDetails = Product::find($id);
        return view('Product.details',['product'=> $productDetails]);
    }

    function orderNow(){
        $userId = Session::get('user')['id'];
        $amount = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->where('cart.user_id', $userId)
        ->sum('products.price');

        return view('ordernow', ['totalAmount'=>$amount]);
    }

    function placedOrder(Request $req){
        $userId = Session::get('user')['id'];
        $allCart = cart::where('user_id', $userId)->get();
        foreach ($allCart as $element) {
            $order = new Order;
            $order->product_id = $element['product_id'];
            $order->user_id = $element['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            cart::where('user_id', $userId)->delete();
        }
        return redirect('/');
    }

    function myOrders(){
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.user_id', $userId)
        ->get();

        return view('myorders', ['orderItems'=>$orders]);

    }
}

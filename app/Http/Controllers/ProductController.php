<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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

    function addToCart(Request $req){


        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }

    function cartList(){
      $userId = Session::get('user')['id'];

      $products = DB::table('cart')
      ->join('products', 'cart.product_id', '=', 'products.id')
      ->where('cart.user_id', $userId)
      ->select('products.*', 'cart.id as cart_id')
      ->get();
      return view('cartlist', ['products'=>$products]);
    }

    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
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

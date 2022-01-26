<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartController extends Controller
{
    function addToCart(Request $req){


        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product;
            $cart->unit = $req->unit;
            $cart->save();

            //session
            $productID= $req->product;
            $req->session()->push('cartItem', $productID);
            
            //response
            $response = [
                'productAddedToCart' => true,
            ];

            return response()->json($response, 201);
        }
        
        else{
            //respone
            $response = [
               // 'status' => false,
                'redirect_uri' => route('login')  
            ];

            return response()->json($response,401);
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


}

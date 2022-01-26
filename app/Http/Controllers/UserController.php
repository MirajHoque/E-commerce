<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\cart;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    function logIn(Request $req){
        $user = User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password, $user->password)){
            return "Email or password is not matched";
        }
        else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    function Registration(Request $req){
        $user = new User;
        $user->name = $req->userName;
        $user->name = $req->email;
        $user->name = $req->password;
        
        return redirect('login');
    }

    function logOut(){
        $userId = Session()->get('user')['id'];
        $cartItem = Cart::where('user_id', '=', $userId)->delete();
        
        //destroy session
        Session::forget('user');
        Session::forget('CartItem');
        Session::flush();
        return redirect('login');
    }
}

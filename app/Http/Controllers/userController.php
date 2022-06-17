<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class userController extends Controller
{
    public function check_login(Request $req){
        $user = $req->only('email','password');
        if (Auth::attempt($user)) {
            return redirect('/product')->with(['status' => 201, 'message' => null,'data' => null]);
        }
        $req->session()->put('user',$user);    
        return redirect()->back()->with('message', 'Password Or User Name is Incorrent Please Try Adain...!');

   
    }

}

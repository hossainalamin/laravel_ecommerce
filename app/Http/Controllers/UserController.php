<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $req){
        $user = User::where(["email"=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password)){
            echo "User doesn't match";
        }else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
    public function register(Request $req){
        $validate = $req->validate([
            "name" => "min : 6|unique:users|required",
            "email"    => "required",
            "password" => "min:5"   
        ]);
        if($validate){
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = HASH::make($req->password);
        $user->save();
        return redirect('/login');
        }
    }
}

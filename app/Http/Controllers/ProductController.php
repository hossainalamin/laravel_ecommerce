<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();
        return view("product",["products"=>$data]);
    }
    public function detail($id){
        $product = Product::find($id);
        return view("detail",["product"=>$product]);
    }
    public function search(Request $req){
        $search_prod =  $req->input('search');
        $data = Product::where('name','like','%'.$search_prod.'%')->SimplePaginate(1);
        return view('search',["search_prod"=>$data]);
    }
    public function addCart(Request $req){
        if($req->session()->has('user')){
            $cart  = new Cart();
            $cart ->user_id = $req->session()->get('user')['id'];
            $cart->prod_id  = $req->prod_id;
            $check = Cart::where('user_id',$cart->user_id)
            ->where('prod_id',$cart->prod_id)->get();
            if($check){
                return redirect()->back()->with('status', 'Profile updated!');
            }else{
            $cart->save();
                return redirect('/')->with('message','Add to cart successfully');
            }
        }else{
            return redirect("login");
        }
    }
    public static function cartItem(){
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }
}
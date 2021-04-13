<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
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
            $cart->save(); 
            return redirect('/')->with('message','Add to cart successfully');
        }else{
            return redirect("login");
        }
    }
}

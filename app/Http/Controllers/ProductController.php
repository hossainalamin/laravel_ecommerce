<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
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
            Cart::where('user_id',$cart->user_id)
            ->where('prod_id',$cart->prod_id)->get();
            $cart->save();
            return redirect('/')->with('message','Add to cart successfully');
            
        }else{
            return redirect("login");
        }
    }
    public static function cartItem(){
        $user_id = Session::get('user')['id'];
        return Cart::where('user_id',$user_id)->count();
    }
    public function cartlist(){
        $user_id = Session::get('user')['id'];
        $products = DB::table('carts')
        ->join('products','carts.prod_id','products.id')
        ->where('user_id',$user_id)
        ->select('products.*','carts.id as cart_id')
        ->get();
        return view('cartlist',["products"=>$products]);
    }
    public function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    public function orderCart(){
        $user_id = Session::get('user')['id'];
        $price = DB::table('carts')
        ->join('products','carts.prod_id','products.id')
        ->where('user_id',$user_id)
        ->select('products.*','carts.id as cart_id')
        ->sum('products.price');
        return view('ordernow',["total"=>$price]); 
    }
    public function placeOrder(Request $req){
        $user_id   = Session::get('user')['id'];
        $cart_prod = Cart::where('user_id',$user_id)->get();
        foreach($cart_prod as $order_item){
            $order = new Order();
            $order->product_id = $order_item['prod_id']; 
            $order->user_id    = $order_item['user_id']; 
            $order->status     = 'pending'; 
            $order->payment_method = $req->payment; 
            $order->payment_status = "pending";
            $order->address = $req->address;
            if(empty($order->payment_method) or empty($order->address)){
                return redirect('ordernow')."<script>
                alert('Any of the feild should not be empty!');
                window.location('ordernow');
                </script>";
            }else{
            $order->save();
            Cart::where('user_id',$user_id)->delete();
            }
        }
        return redirect('/');
    }
    public function myOrders(){
        $user_id = Session::get('user')['id'];
        $order_list = DB::table('orders')
        ->join('products','orders.product_id','products.id')
        ->where('user_id',$user_id)
        ->select('products.*','orders.*')
        ->get();
        return view('myorders',["orders"=>$order_list]);
    }
}
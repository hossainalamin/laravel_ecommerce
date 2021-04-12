<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
}

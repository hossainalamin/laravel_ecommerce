@extends('master')
@section('content')
<div class="container detail">
    <div class="row my-3">
        <div class="col-md-6 detail-col margin">
            <img src="{{$product['gallery']}}" alt="" class="detail-img">
        </div>
        <style>
        .margin {
            border-right: 1px solid #000;
        }
        </style>
        <div class="col-md-6">
            <h3>{{$product['name']}}</h3>
            <br>
            <h4>Price : {{$product['price']}}</h4>
            <h4>Category : {{$product['category']}}</h4>
            <h4>Detail : {{$product['description']}}</h4>
            <br>
            <a href="" class="btn btn-outline-danger">Add to cart</a>
            <a href="" class="btn btn-outline-primary">Buy Now</a>
            <br>
            <a href="/" class="my-3">Go Back</a>
        </div>
    </div>
</div>
@endsection
@extends('master')
@section('content')
<div class="container login-form">
    <h3 class="text-center font-italic my-2 bg-dark py-3 text-light">Search Result</h3>
    <div class="row">
        @foreach($search_prod as $item)
        <div class="col-md-4">
            <a href="detail/{{$item['id']}}">
                <div class="trending-item">
                    <img class="trending-image" src="{{$item['gallery']}}" alt="">
                    <p class="ml-4 mt-3">{{$item['name']}}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <span class="text-center">
    {{$search_prod->links()}}
    </span>
</div>
@endsection
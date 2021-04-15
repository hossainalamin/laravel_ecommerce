<?php
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user')){
$total  = ProductController::cartItem();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Shopping BD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Orders</a>
                </li>
            </ul>
            <form class="d-flex" action="/search">
                <input class="form-control me-2 search-box ml-5 pl-5" type="search" placeholder="Search" name="search"
                    aria-label="Search">
                <button class="btn btn-danger ml-3" type="submit">Search</button>
            </form>
            <ul class="ml-auto navbar-nav">
                @if(Session::has('user'))
                <li class="nav-item"><a href="/cartlist" class="nav-link">Cart({{$total}})</a><li>
                @endif
                @if(Session::has('user'))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Session::get('user')['name']}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
                @endif

            </ul>

        </div>
    </div>
</nav>
@extends('master')
@section('content')
<div class="container login-form">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="card  rounded login">
                <div class="card-body">
                    <form action="login" method="post">
                        <div class="mb-3">
                        @csrf
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login Here</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
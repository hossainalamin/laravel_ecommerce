@extends('master')
@section('content')
<div class="container login-form">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="card  rounded login">
                <div class="card-body">
                    <form action="register" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="name">
                            <span style='color:red;'>@error('name'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                            <span style='color:red;'>@error('email'){{$message}}@enderror</span>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password">
                            <span style='color:red;'>@error('password'){{$message}}@enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary">Login Here</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
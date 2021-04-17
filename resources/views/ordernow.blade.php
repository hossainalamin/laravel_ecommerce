@extends('master')
@section('content')
<div class="container">
    <div class="order-product my-3">
        <h3 class="text-center font-italic my-2 bg-dark py-3 text-light">Order </h3>
        <table class="table table-striped">
            <tr>
                <td>Amount</td>
                <td>$ {{$total}}</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>0</td>
            </tr>
            <tr>
                <td>Delevery Charg</td>
                <td>$ 10</td>
            </tr>
            <tr>
                <td>Total amount</td>
                <td>$ {{$total + 10}}</td>
            </tr>
        </table>
        <br>
        <br>
        <div class="form">
            <form action="" method="">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Payment Option</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Online</option>
                        <option>Cash On delevery</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
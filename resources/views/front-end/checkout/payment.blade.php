@extends('front-end.master')
@section('title')
    Payment
@endsection

@section('main-content')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Payment</span></h3>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 well text-center text-info">
                Dear <strong>{{ Session ::get('customerName') }}</strong>, You must provide product payment method!<br>

            </div>
        </div>
        <div class="row ">
            <div class="col-md-8 col-md-offset-2 well">
                {{ Form::open(['route'=>'new-order', 'method'=>'POST']) }}
                <table class="table table-bordered bg-info">
                    <tr>
                        <th>Cash on delivery</th>
                        <td><input type="radio" name="payment_type" value="cash"/> Cash on delivery</td>
                    </tr>

                    <tr>
                        <th>Paypal</th>
                        <td><input type="radio" name="payment_type" value="paypal"/> Paypal</td>
                    </tr>

                    <tr>
                        <th>Bkash</th>
                        <td><input type="radio" name="payment_type" value="bkash"/> Bkash</td>
                    </tr>

                    <tr>
                        <th></th>
                        <td><input type="submit" name="btn" class="btn btn-success" value="Confirm Order"/></td>
                    </tr>
                </table>
                {{ Form::close() }}
            </div>
        </div>
    </div>



@endsection
@extends('front-end.master')
@section('title')
    Shipping
@endsection

@section('main-content')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Shipping</span></h3>
        </div>
    </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 well text-center text-info">
                        Dear <strong>{{ Session ::get('customerName') }}</strong>, You must provide product shipping info to complete your Order!<br>
                        <h3><marquee behavior="alternate" style="color: red" width="100%"> If your Billing info & Shipping info are the same,just press on Save Shipping Info Button Below!</marquee></h3>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md-8 col-md-offset-4 well">
                        <h3 class="text-center text-info">Shipping Info goes here !!</h3>
                        <br>
                        {{ Form::open(['route'=>'new-shipping','method'=>'POST']) }}
                        <div class="form-group">
                            <input type="text" name="full_name" value="{{ $customer->first_name.' '.$customer->last_name }}" class="form-control" placeholder="Full Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="{{ $customer->email }}" class="form-control" placeholder="example@email.com"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_number" value="{{ $customer->phone_number }}" class="form-control" placeholder="Phone No."/>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control" placeholder="Address">{{ $customer->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control btn btn-success" value="Save Shipping Info"/>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>



@endsection
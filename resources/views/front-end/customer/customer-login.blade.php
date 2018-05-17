@extends('front-end.master')
@section('title')
    CheckOut
@endsection

@section('main-content')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>CheckOut</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 well">
                        <h3>Register here! </h3>
                        <br>
                        {{ Form::open(['method'=>'POST']) }}
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="example@email.com"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_number" class="form-control" placeholder="Phone No."/>
                        </div>
                        <div class="form-group">
                            <textarea name="address" class="form-control" placeholder="Address"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control btn btn-success" value="Register"/>
                        </div>
                        {{Form::close()}}
                    </div>
                    <div class="col-md-5 well" style="margin-left:30px ">
                        <h3 class="text-center"> Login here !!!</h3>

                        <h4><marquee behavior="alternate" style="color: red; margin-top: 5px" width="80%">{{ Session::get('message') }}</marquee></h4>
                        <br>
                        {{ Form::open(['method'=>'POST']) }}
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="example@email.com"/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" class="form-control btn btn-info" value="Login"/>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
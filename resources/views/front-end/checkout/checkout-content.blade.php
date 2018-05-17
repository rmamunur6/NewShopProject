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
                    <div class="col-md-12 well">
                        <h3 class="text-center text-info">You must Login! to Complete your Order.Please Register,if you are not Registered yet! </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 well">
                        <h3>Register! if you are not been Registered Yet !!</h3>
                        <br>
                        {{ Form::open(['route' => 'customer-sign-up','method'=>'POST']) }}
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com"/>
                                <span class="text-secondary" id="res"></span>
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
                                <input type="submit" id="regBtn" name="btn" class="form-control btn btn-success" value="Register"/>
                            </div>
                        {{Form::close()}}
                </div>
                    <div class="col-md-5 well" style="margin-left:30px ">
                        <h3 class="text-center">Already Registered ? Login here !!!</h3>

                        <h4><marquee behavior="alternate" style="color: red; margin-top: 5px" width="80%">{{ Session::get('message') }}</marquee></h4>
                        <br>
                        {{ Form::open(['route'=>'customer-login','method'=>'POST']) }}
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

    <script>
        var email=document.getElementById('email');
        email.onblur=function () {

            var email=document.getElementById('email').value;
            var xmlHttp= new XMLHttpRequest();
            var serverPage='http://localhost/NewShopProject/public/ajax-email-check/'+email;
            xmlHttp.open('GET',serverPage);
            xmlHttp.onreadystatechange = function () {

                if(xmlHttp.readyState ==4 && xmlHttp.status == 200){
                    document.getElementById('res').innerHTML=xmlHttp.responseText;
                    if(xmlHttp.responseText == 'already exist'){
                        document.getElementById('regBtn').disabled = true;
                    }else {
                        document.getElementById('regBtn').disabled = false;
                    }

                }
            }

            xmlHttp.send(null);
        }

    </script>

@endsection
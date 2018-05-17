@extends('admin.master')
@section('title')
    VIew Order Details
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1 class="text-center bg-dark mark">Invoice</h1>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="bg-primary">Invoice No:</th>
                                        <td>0000{{ $order->id }}</td>
                                    </tr>

                                    <tr>
                                        <th class="bg-primary">Date:</th>
                                        <td>{{ $order->created_at }}</td>
                                    </tr>

                                    <tr>
                                        <th class="bg-primary">Amount Due:</th>
                                        <td>TK.{{ $order->order_total }}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <table class="float-left table table-bordered">
                                    <h3 class="text-center text-success">Shipping Info</h3>
                                    <tr class="bg-primary">
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>

                                    </tr>
                                    <tr>
                                        <td>{{ $shipping->full_name }}</td>
                                        <td>{{ $shipping->address }}</td>
                                        <td>{{ $shipping->phone_number }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-md-5">

                                <table class=" table table-bordered">
                                    <h3 class="text-center text-success">Billing Info</h3>
                                    <tr class="bg-primary">
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-10">
                            <table class="table table-bordered">
                                <h3 class="text-center text-success">Product Info</h3>
                                <tr class="bg-primary">
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Price</th>
                                </tr>
                                @php($sum=0)
                                @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->product_name }}</td>
                                        <td>{{ $orderDetail->product_quantity }}</td>
                                        <td>TK.{{ $orderDetail->product_price }}</td>
                                        <td>TK.{{ $total=$orderDetail->product_price*$orderDetail->product_quantity}}</td>
                                    </tr>
                                    @php($sum=$sum+$total)
                                    @endforeach

                            </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-4">
                                <table class="table-bordered table float-right">
                                    <tr>
                                        <th class="bg-primary">Total Amount</th>
                                        <td><mark style="color: red">TK.{{ $sum }}</mark></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('admin.master')
@section('title')
    VIew Order Details
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-success text-center" id="message">Order Details Info For This Order</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Order No</th>
                                <td>{{ $order->id }}</td>
                            </tr>

                            <tr>
                                <th>Order Total</th>
                                <td>{{ $order->order_total }}</td>
                            </tr>

                            <tr>
                                <th>Order Status</th>
                                <td>{{ $order->order_status }}</td>
                            </tr>

                            <tr>
                                <th>Order Date</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-success text-center" id="message">Customer For This Order</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                            </tr>

                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $customer->phone_number }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $customer->email }}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-success text-center" id="message">Shipping Info For This Order</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Full Name</th>
                                <td>{{ $shipping->full_name }}</td>
                            </tr>

                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $shipping->phone_number }}</td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td>{{ $shipping->email }}</td>
                            </tr>

                            <tr>
                                <th>Address</th>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4 class="text-success text-center" id="message">Payment Info For This Order</h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Payment Type</th>
                                <td>{{ $payment->payment_type }}</td>
                            </tr>

                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $payment->payment_status }}</td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Product Info For this Order</h4>
                </div>
                <div class="panel-body">
                    <h4 class="text-success text-center" id="message"></h4>
                    <table class="table table-bordered">
                        <tr class="bg-primary">
                            <th>Sl No</th>
                            <th>Product Id</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                        </tr>
                        @php($i=1)
                        @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $orderDetail->product_id }}</td>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>TK. {{ $orderDetail->product_price }}</td>
                            <td>{{ $orderDetail->product_quantity }}</td>
                            <td>TK. {{ $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
<!DOCTYPE html>

<html>

<head>

    <title>Download Invoice</title>

</head>

<body>
    <h1>Invoice Information</h1>
    <table border="1">
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

    <h1>Billing Info</h1>
    <table border="1">
        <tr>
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

    <h1>Shipping Info</h1>
    <table border="1">
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

    <h1>Product Info</h1>
    <table border="1">
        <tr>
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

    <table border="1">
        <tr>
            <th>Total Amount</th>
            <td><mark style="color: red">TK.{{ $sum }}</mark></td>
        </tr>
    </table>


</body>

</html>
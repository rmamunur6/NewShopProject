<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use DB;
use App\Order;
use App\Customer;
use PDF;


class OrderController extends Controller
{
    public function manageOrderInfo(){
        $orders= DB::table('orders')
            ->join('customers','orders.customer_id', '=', 'customers.id')
            ->join('payments','orders.id', '=', 'payments.order_id')
            ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
            ->get();

        return view('admin.order.manage-order',['orders'=>$orders]);
    }

    public function viewOrderDetails($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $payment=Payment::find($order->id)->first();
        $orderDetails=OrderDetail::where('order_id',$order->id)->get();


        return view('admin.order.view-order',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails
        ]);
    }

    public function viewOrderInvoice($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        //$payment=Payment::find($order->id)->first();
        $orderDetails=OrderDetail::where('order_id',$order->id)->get();

        return view('admin.order.view-order-invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'orderDetails'=>$orderDetails
        ]);
    }

    public function downloadOrderInvoice($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $payment=Payment::find($order->id)->first();
        $orderDetails=OrderDetail::where('order_id',$order->id)->get();

        $data = ['title' => 'Customer Order Invoice'];

        $pdf = PDF::loadView('admin.order.download-invoice',[
            'data'=>$data,
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'orderDetails'=>$orderDetails
        ]);
        return $pdf->stream('invoice.pdf');

    }
}

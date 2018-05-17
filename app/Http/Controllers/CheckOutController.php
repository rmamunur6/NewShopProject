<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Session;
use Mail;

class CheckOutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    protected function customerInfoValidate($request){
        $this->validate($request,[
            'first_name' =>'required',
            'last_name' => 'required',
            'email' =>'email|unique:customers,email',
            'password' =>'required',
            'phone_number' =>'required',
            'address' =>'required',
        ]);
    }

    public function customerSignUp(Request $request){
        $this->customerInfoValidate($request);
        $customer=new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email = $request->email;
        $customer->password =bcrypt($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();
        $customerId =  $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $customerData = $customer->toArray();

        Mail::send('front-end.mails.confirmation-mail',$customerData,function ($message) use($customerData){
            $message->to($customerData['email']);
            $message->subject('confirmation-mail');
        });

        return redirect('/checkout/shipping');

    }

    public function customerLoginCheck(Request $request){
        $customer=Customer::where('email',$request->email)->first();

        if(password_verify($request->password,$customer->password)){
            Session::put('customerId',$customer->id);
            Session::put('customerName',$customer->first_name.' '.$customer->last_name);

            return redirect('/checkout/shipping');
        }else{
            return redirect('/checkout')->with('message','Please provide a valid password');
        }

    }

    public function customerLogout(Request $request){
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');
    }

    public function newCustomerLoginCheck(){
        return view('front-end.customer.customer-login');
    }

    public function shippingForm(){
        $customer =Customer::find(Session::get('customerId'));
        return view('front-end.checkout.shipping',['customer'=> $customer]);
    }

    public function saveShippingInfo(Request $request){
        $shipping=new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }
    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request){
        $paymentType=$request->payment_type;
        if($paymentType == 'cash'){
            $order=new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment=new Payment();
            $payment->order_id =$order->id;
            $payment->payment_type =$paymentType;
            $payment->save();

            $cartProducts= Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetail=new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id=$cartProduct->id;
                $orderDetail->product_name=$cartProduct->name;
                $orderDetail->product_price=$cartProduct->price;
                $orderDetail->product_quantity=$cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();
            return redirect('/complete/order');


        }else if($paymentType == 'paypal'){
            $order=new Order();
            $order->customer_id = Session::get('customerId');
            $order->shipping_id = Session::get('shippingId');
            $order->order_total = Session::get('orderTotal');
            $order->save();

            $payment=new Payment();
            $payment->order_id =$order->id;
            $payment->payment_type =$paymentType;
            $payment->save();

            $cartProducts= Cart::content();
            foreach($cartProducts as $cartProduct){
                $orderDetail=new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id=$cartProduct->id;
                $orderDetail->product_name=$cartProduct->name;
                $orderDetail->product_price=$cartProduct->price;
                $orderDetail->product_quantity=$cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();


        }else if($paymentType == 'bkash'){

        }
    }

    public function completeOrder(){
        return 'success';
    }

    public function ajaxEmailCheck($a){
        $customer=Customer::where('email',$a)->first();
        if($customer){
            echo 'already exist';
        }
        else{
            echo 'available';
        }
    }
}

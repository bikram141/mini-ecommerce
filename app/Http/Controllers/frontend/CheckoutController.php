<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;




class CheckoutController extends Controller
{
    public function index(){
        $cart=Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout',compact('cart'));
    }
    public function placeorder(Request $request)
    {

        $order=new Order();
        $order->name=$request->input('name');
        $order->user_id=Auth::id();
        $order->email=$request->input('email');
        $order->mobile=$request->input('mobile');
        $order->address=$request->input('address');
        $order->pincode=$request->input('pincode');
        $total=0;
        $cart_total=Cart::where('user_id',Auth::id())->get();
        foreach($cart_total as $prod)
        {
            $total += $prod->product->price;
        }
        $order->total_price=$total;
        $order->tracking_no='ecommerce'.rand(1111,9999);
        $order->save();

        $order->id;
        $cartitems=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'price'=>$item->product->price,
            ]);
        }
        if(Auth::user()->address == NULL)
        {
            $user=User::where('id',Auth::id())->first();
            $user->mobile=$request->input('mobile');
            $user->address=$request->input('address');
            $user->pincode=$request->input('pincode');
            $user->update();
        }
        $cartitems=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return Redirect('/')->with('status','Order placed successfully');
    }
}

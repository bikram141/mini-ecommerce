<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id=$request->input('product_id');

        if(Auth::check())
        {
            $prod_check=Product::where('id',$product_id)->first();
            
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->first())
                {
                    return response()->json(['status'=>$prod_check->name."alredy added to cart"]);

                }else{
                $cartItem=new Cart();
                $cartItem->prod_id=$product_id;
                $cartItem->user_id=Auth::id();
                $cartItem->save();
                return response()->json(['status'=>$prod_check->name." added to cart"]);
            }
        }
        }else
        {
            return response()->json(['status'=>"Please login first"]);

        }
    }

    public function viewCart()
    {
        $cart=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cart'));
    }

    public function removeProduct(Request $request)
    {
        if(Auth::check())
        {   
        $prod_id=$request->input('prod_id');

        if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first())
                {
                   
                $cartItem=Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status'=>"Removed from cart successfully!"]);
            }
        }
        else{
            return response()->json(['status'=>"Please login first"]);

        }
    }
    public function cartCount()
    {
    $cartcount= Cart::where('user_id',Auth::id())->count();
    dd($carcount);
    return response()->json(['count'=>$cartcount]);
    }
}

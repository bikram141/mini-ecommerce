<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class FrontendController extends Controller
{
    public function index(){
        $product=Product::get();
        return view('frontend.index',compact('product'));
    }
    public function view($id){
        $product=Product::where('id',$id)->get();
        return view('frontend.view',compact('product'));
    }
}

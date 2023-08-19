<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::get();
        return view('admin.product.index',compact('product'));
    }
    public function add()
    {
        return view('admin.product.add');
    }
    public function create(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'img'=>'required|mimes:png,jpeg,jpg',
            'price'=>'required',
            'description'=>'required',
            
        ]);
        $image=$request->file('img');
        $name=time().'.'.$image->getClientOriginalExtension();
        $destinationPath=public_path('/images');
        $image->move($destinationPath,$name);

        $product=new Product();
        $product->name=$request->get('name');
        $product->image=$name;
        $product->price=$request->get('price');
        $product->description=$request->get('description');
        $product->save();
        $request->session()->flash('alert-success', 'product added successfully');
        return redirect('admin/product-list');
    }
    public function edit($id)
    {
        $product= Product::find($id);
        return view('admin.product.edit',compact('product'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            
        ]);
        $product=Product::find($id);
        $name=$product->image;
        if($request->hasFile('img')){
            $image=$request->file('img');
            $name=time().'.'.$image->getClientOriginalExtension();
            $destinationPath=public_path('/images');
            $image->move($destinationPath,$name);
        }
        $product->name=$request->get('name');
        $product->image=$name;
        $product->price=$request->get('price');
        $product->description=$request->get('description');
        $product->save();
        $request->session()->flash('alert-success', 'product updated successfully');
        return redirect('admin/product-list');
    }
    public function delete(Request $request, $id)
    {
        $product= Product::find($id);
        $product->delete();
        $request->session()->flash('alert-danger',' deleted successfully');
        return redirect('admin/product-list');
    }
}

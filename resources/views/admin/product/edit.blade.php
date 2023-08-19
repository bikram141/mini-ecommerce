@extends('layouts.admin')

@section('content')

<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark "><i class="fa fa-arrow-left"
                    aria-hidden="true"></i> Go Back</a>
                    
                <h4 class="card-title mt-2">edit Product Form</h4>
                <p class="card-description">
                  Basic form of product
                </p>
                @include('admin.message.alert_msg')
                <form class="forms-sample" action="{{url('admin/update-product',[$product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{$product->name}}" placeholder="Name">
                  </div>
                
                  <div class="form-group">
                    <label>File upload</label>
                    <img src="{{asset('images')}}/{{ $product->image }}" width="100" height="100">
                    <input type="file" class="form-control" name="img" accept="image/*"
                    id="img">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCity1">price</label>
                    <input type="text" class="form-control" id="exampleInputCity1" name="price" value="{{$product->price}}" placeholder="price">
                  </div>
                  <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control" id="exampleTextarea1" name="description"  rows="4">{{$product->description}}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                  <button class="btn btn-light">Cancel</button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
  
@endsection
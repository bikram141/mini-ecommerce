@extends('layouts.app')

@section('titile','Home page')
@section('content')


<section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>cart Details</strong></h4>

      
      <div class="row product_data">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
              <h3 class="fw-normal mb-0 text-black">Your Shopping Cart</h3>
            </div>
            
            @php $total=0;@endphp
            @foreach ($cart as $key=>$item ) 
            <div class="card rounded-3 mb-4">
              <div class="card-body p-4">
                <div class="row d-flex justify-content-between align-items-center">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    @if($item->product->image)
                  
                    <img src="{{asset('images')}}/{{ $item->product->image }}" width="200" height="250"
                    class="img-fluid rounded-3" alt="img"/>
                      @endif
                  
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <p class="lead fw-normal mb-2">{{$item->product->name}}</p>
                  </div>
                <input type="hidden" class="prod_id" value="{{$item->prod_id}}">
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h5 class="mb-0">Rs.{{$item->product->price}}</h5>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <button class="text-danger deleteCartBtn"><i class="fa fa-trash"></i>remove</button>
                  </div>
                </div>
              </div>
            </div>
            @php $total+= $item->product->price @endphp
         @endforeach 
            
          </div>
      
         <div class="card">
            <div class="card-footer">
                <h6>Total Price: Rs.{{$total}}</h6>
              <a href="{{url('checkout')}}" class="btn btn-warning btn-outline btn-sm float-right">Proceed to Pay</a>
            </div>
          </div>
      </div>
    </div>
  </section>

   
@endsection


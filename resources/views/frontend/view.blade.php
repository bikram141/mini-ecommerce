@extends('layouts.app')

@section('titile','Home page')
@section('content')


<section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>Product Details</strong></h4>

      
      <div class="row product_data">
        @foreach ($product as $key=>$item )

        <div class="col-md-5 mt-3">
            <div class="bg-white border">
                @if($item->image)
                  
                <img src="{{asset('images')}}/{{ $item->image }}" width="200" height="250"
                   />
                  @endif
  
            </div>
        </div>
        <div class="col-md-7 mt-3">
            <div class="product-view">
                <h4 class="product-name">
                    {{$item->name}}
                </h4>
                <hr>
                  <input type="hidden" value="{{$item->id}}" class="prod_id">
                <div>
                    <span class="selling-price">Rs.{{$item->price}}</span>
                </div>
               
                <div class="mt-2">
                    <a href="" class="btn btn1 btn-primary addToCartBtn"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                </div>
          
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header bg-white">
                    <h4>Description</h4>
                </div>
                <div class="card-body">
                    <p>
                        {{$item->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
        @endforeach
      </div>
    </div>
  </section>

   
@endsection


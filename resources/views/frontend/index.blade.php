@extends('layouts.app')

@section('titile','Home page')
@section('content')


<section style="background-color: #eee;">
    <div class="text-center container py-5">
      <h4 class="mt-4 mb-5"><strong>Product</strong></h4>

      
      <div class="row">
        @foreach ($product as $key=>$item )
            
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light"
              data-mdb-ripple-color="light">
              @if($item->image)
                  
              <img src="{{asset('images')}}/{{ $item->image }}" width="100" height="100"
                 />
                @endif

              <a href="#!">
              
                <div class="hover-overlay">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </div>
              </a>
            </div>
            <div class="card-body">
              <a href="" class="text-reset">
                <h5 class="card-title mb-3">{{$item->name}}</h5>
              </a>
             
              <h6 class="mb-3">Rs.{{$item->price}}</h6>

              
            <div class="d-flex flex-row">
         
                <a href="{{url('view-product',[$item->id])}}" class="btn btn1 btn-primary flex-fill me-1"> View </a>
              </div>
            </div>
            
          </div>
        </div>

        @endforeach

      </div>
    </div>
  </section>


@endsection
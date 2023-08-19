@extends('layouts.app')

@section('titile','checkout page')
@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card">
            <div class="card-body p-4">
                <form action="{{url('place-order')}}" method="post">
                    @csrf
              <div class="row">
  
                <div class="col-lg-7">
                  <h5 class="mb-3"><a href="#!" class="text-body"><i
                        class="fa fa-long-arrow-alt-left me-2"></i>back</a></h5>
                  <hr>
  
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                      <p class="mb-1">Basic details</p>
                    </div>
                  </div>
                  @php $total=0;@endphp

                  <form action="{{url('place-order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Full Name</label>
                            <input type="text"  class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Enter Full Name" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone Number</label>
                            <input type="number"  class="form-control" name="mobile" value="{{Auth::user()->mobile}}" placeholder="Enter Phone Number" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Enter Email Address" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Pin-code (Zip-code)</label>
                            <input type="number" class="form-control" name="pincode" value="{{Auth::user()->pincode}}" placeholder="Enter Pin-code" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Full Address</label>
                            <textarea  class="form-control" name="address" rows="2"> {{Auth::user()->address}}</textarea>
                        </div>
                       
                    </div>
                </form>

                 
  
                </div>
                <div class="col-lg-5">
  
                  <div class="card bg-primary text-white rounded-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="mb-0">Order details</h5>
                        
                      </div>
  
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">name</th>
                            <th scope="col">price</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                          <tr>
                            <th>{{$item->product->name}}</th>
                            <td>{{$item->product->price}}</td>
                           
                          </tr>
                          @php $total+= $item->product->price @endphp

                          @endforeach
                         
                        </tbody>
                      </table>

                      <form method="post" action="{!! URL::to('paypal') !!}" >
                        @csrf
                       <input type="hidden" name="amount" value="{{$total}}"> 
                       <input type="submit" name="paynow" value="Pay Now">
                    </form>
                    <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>Rs. {{$total}}</h5>
                  </div>

                      <button type="submit" class="btn btn-secondary float-end">Place order</button>
                    
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   
@endsection


@extends('layouts.admin')

@section('content')

<div class="row">
  @if (session('status'))
  <h2>{{session('status')}}</h2>  
@endif
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
          
           
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">No Of Product</a>
                    </li>
                
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg me-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">product</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="{{url('admin/product-list')}}">
                                <h5 class="mb-0 d-inline-block">View</h5>
                              </a>
                             
                            </div>
                          </div>
                        </div>
                       
                      </div>
                    </div>
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
@endsection
<div>
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
                <h5 class="card-title mb-3">Product name</h5>
              </a>
              <a href="" class="text-reset">
                <p>Category</p>
              </a>
              <h6 class="mb-3">{{$item->price}}</h6>

              
            <div class="d-flex flex-row">
                <button type="button" class="btn btn-primary flex-fill me-1" data-mdb-ripple-color="dark">
                  Learn more
                </button>
                <button type="button" class="btn btn-danger flex-fill ms-1">Buy now</button>
              </div>
            </div>
            
          </div>
        </div>

        @endforeach

      </div>
</div>

@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url('admin/add-product') }}" class="btn btn-dark btn-sm ">Add
                    product</a>
              </div>
          <p class="card-title">Product List</p>
          @include('admin.message.alert_msg')
          <div class="table-responsive">
            <table id="recent-purchases-listing" class="table">
              <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>image</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
              </thead>
              <tbody>
                @if($product->count()>0)
                @foreach ($product as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td><img src="{{asset('images')}}/{{ $item->image }}" width="100" height="100"></td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->description }}</td>
                
                    <td>
                        <form class="deleteForm float-left"
                            action="{{ url('admin/delete-product',$item->id) }}" method="post">
                            <button class="btn btn-sm btn-danger ml-2" type="submit"
                                id="deleteButton">delete
                            </button>
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                        </form>
                        <a href="{{ url('admin/edit-product',$item->id)}}"
                            class="btn btn-sm  ml-2 btn-primary">edit</a>
                    </td>
                </tr>
                @endforeach
                @else
                <td>No data is available</td>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>




  
@endsection
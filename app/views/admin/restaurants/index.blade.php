@extends('admin.layouts.default')

@section('container')
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="active">Restaurants</li>
  </ol>
  <div class="col-md-8"><h2>Restaurants</h2></div>
  <div class="pull-right">
    <a href='{{ route("admin.restaurants.create") }}' class="btn btn-primary">Add New Restaurant</a>
  </div>
  <div class="col-lg-12">
    @if($errors->has())
    <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning!</strong> Following errors occured
      <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}  </li>
        @endforeach
      </ul>
    </div>
    @endif

      <hr>
      <!-- make all table rows clickable using jquery data-href or similar and remove a links-->
      <table class="table table-striped table-hover">
        <tr>
          <th>Logo</th>
          <th>Name</th>
          <th>Address</th>
          <th>Min Order</th>
          <th>Delivery Fee</th>
          <th>Delivery Time</th>
          <th>Active</th>
          <th>Action</th>
        </tr>
        @foreach($restaurants as $restaurant)

          <tr>
            <td>
              <a href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                {{ HTML::image(asset('assets/img/restaurants/'.$restaurant->id.'.jpg'), $restaurant->name, ['height' => '100px', 'class'=>'img-circle'])}}
              </a>
            </td>
            <td width="280px">
              <a href="{{ route('admin.restaurants.show', $restaurant->id) }}">
                <h4> {{ $restaurant->name }} </h4>
                <p> {{ $restaurant->description }} </p>
              </a>
            </td>
            <td>
              {{ $restaurant->area->name }}
            </td>
            <td>
              Rs. {{ $restaurant->min_order }}
            </td>
            <td>
              Rs. {{ $restaurant->delivery_fee }}
            </td>
            <td>
              {{ $restaurant->delivery_time }} minutes
            </td>
            <td>
              @if($restaurant->active)
                <a href="#">Active</a>
              @else
                <a href="#">Inactive</a>
              @endif
            </td>
            <td>{{ Form::open(
              array(
              'method' => 'DELETE',
              'url' => route('admin.restaurants.destroy', $restaurant->id),
              'class' => 'form-inline')) }}
              {{ Form::submit('Delete', array('class' => 'btn btn-link')) }}
              {{ Form::close() }}
            </td>
          </tr>
        @endforeach
      </table>
    <hr>
  </div>
@stop

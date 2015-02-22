@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Restaurant</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
  <li class="active">Restaurant Details</li>
</ol>
    <hr>
    <div class="col-md-12">
      <div class="page-header">
        <div class="media">
          <div class="media-left">
            {{ HTML::image(asset('assets/img/restaurants/'.$restaurant->id.'.jpg'), $restaurant->name, ['height' => '100px', 'class'=>'img-circle'])}}
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{$restaurant->name}}</h4>
            <div class="col-md-3">
              <ul class='list-unstyled'>
                <li><b>Minimum Order:</b> &#8377; {{$restaurant->min_order}}</li>
                <li><b>Delivery Time:</b> {{$restaurant->delivery_time}} min</li>
                <li><b>Delivery Fee:</b> &#8377; {{$restaurant->delivery_fee}} </li>
                <li><b>Online Payment:</b> @if($restaurant->active) Available @else Not Available @endif </li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul class='list-unstyled'>
                <li><b>Cash on Delivery:</b> @if($restaurant->active) Available @else Not Available @endif </li>
                <li><b>Order Start Time:</b> {{$restaurant->order_start_time}} </li>
                <li><b>Order Stop time:</b> {{$restaurant->order_stop_time}} </li>
                <li><b>Active:</b> @if($restaurant->active) Yes @else No @endif</li>
              </ul>
            </div>
            <div class="col-md-3">
              <b>Restaurant Address</b>
              <p> {{ $restaurant->area->name }}, {{ $restaurant->area->city->name }},
                {{ $restaurant->area->city->state->name }},  {{ $restaurant->area->city->state->country->name }},   </p>
              </div>
            <div class="col-md-3">
              <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-primary">Edit Restaurant Details</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery">
           Menu
          <a href="{{ route('admin.restaurants.menu.edit', $restaurant->id) }}">
            edit
          </a>
        </h4>
        <table class="table table-striped table-hover">
            <tr>
              <th>Food</th>
              <th>Description</th>
              <th>Price</th>
            </tr>
            @foreach($restaurant->foods as $food)
            <tr>
              <td>
                {{$food->name}}
              </td>
              <td>
                {{$food->description}}
              </td>
              <td>
                {{$food->pivot->price}}
              </td>
            </tr>
            @endforeach
          </table>
      </div>

      <div class="col-md-6">
        <h4 class="col-md-12 text-center glyphicon glyphicon-map-marker">
           Delivery Areas
           <a href="{{ route('admin.restaurants.delivery_areas.edit', $restaurant->id)}}">
             edit
           </a>
        </h4>
        <table class="table table-striped table-hover">
          <tr>
            <th>Area</th>
            <th>City</th>
            <th>State</th>
          </tr>
          @foreach($restaurant->delivery_areas as $area)
          <tr>
            <td>
              {{ $area->name }}
            </td>
            <td>
              {{ $area->city->name }}
            </td>
            <td>
              {{ $area->city->state->name }}
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
@stop

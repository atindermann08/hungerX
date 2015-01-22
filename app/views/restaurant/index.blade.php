@extends('layouts.default')

@section('container')
  <div class="ui page grid">
    @if(count($restaurants))
      <h3>
        Select from {{count($restaurants)}} Restaurants delivering in {{$area->name}}, {{$city->name}}
        <small><i class="location arrow icon"></i><a href='{{route("select.city")}}'>Change delivery location.</a></small>
      </h3>
    @else
      <h3>
        No Restaurants deliver in
        <small><i class="location arrow icon"></i><a href='{{route("select.city")}}'>Change delivery location.</a></small>
      </h3>
    @endif


    @foreach ($restaurants as $restaurant)
    <div class="four wide column">
      {{ Form::open(array('method' => 'GET', 'route' => 'restaurant.show')) }}
      <div class="ui card">
        <div class="image">
          <img class='img-rounded' src="assets/img/restaurants/test.jpg" alt="{{$restaurant->name}}" />
        </div>
        <div class="content">
          {{$restaurant->name}}
          <div class="description">

          </div>
        </div>
        <div class="extra content">
          <p>
            <ul>
              <li>Minimum Order: Rs.{{$restaurant->min_order}}</li>
              <li>Delivery Time: {{$restaurant->delivery_time}} min</li>
            </ul>
          </p>
        </div>
      </div>
      {{ Form::close() }}
    </div>
    @endforeach
  </div>
@stop

@extends('layouts.default')

@section('container')
<div class='container'>
  <div class="row">
    @if(count($restaurants))
      <h3>
        Select from {{count($restaurants)}} Restaurants delivering in {{$area->name}}, {{$city->name}}
        <small><i class="location arrow icon"></i><a href='{{route("select.city")}}'>Change delivery location.</a></small>
      </h3>
    @else
      <h3>
        No Restaurants deliver in {{$area->name}}, {{$city->name}}
        <small><i class="location arrow icon"></i><a href='{{route("select.city")}}'>Change delivery location.</a></small>
      </h3>
    @endif


    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-sm-4 col-md-3">
                <a href="{{route('restaurant.show',$restaurant->id)}}" class="thumbnail btn">
                  <img class='img-rounded' src="{{asset('assets/img/restaurants/test.jpg')}}" alt="{{$restaurant->name}}" />
                  <div class="caption">
                    <h3>{{$restaurant->name}}</h3>

                        <ul class='list-unstyled'>
                          <li>Minimum Order: &#8377; {{$restaurant->min_order}}</li>
                          <li>Delivery Time: {{$restaurant->delivery_time}} min</li>
                        </ul>

                  </div>
                </a>
            </div>
        @endforeach
    </div>
    </div></div>
@stop

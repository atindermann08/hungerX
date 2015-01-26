@extends('layouts.default')

@section('container')
<div class='container'>
  <div class="ui page grid">
    <div class="eleven wide column">
      <div class="ui orange segment">
        <div class="ui items">
          <div class="item">
            <a class="ui tiny image">
              <img src="{{asset('assets/img/restaurants/test.jpg')}}">
            </a>
            <div class="content">
              <a class="header">{{$restaurant->name}}</a>
              <div class="description">
                <div class="ui list">
                  <div class="item">
                    <div class="content">
                      <div class="header">Minimum Order: Rs.{{$restaurant->min_order}}</div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="content">
                      <div class="header">Delivery Time:{{$restaurant->delivery_time}} min</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h4 class="ui horizontal header divider">
          <i class="food icon"></i>
          Menu
        </h4>
        @foreach ($restaurant->foods as $food)
          <div class="ui divided list">
            <div class="item">
              <div class="right floated">
                <b>{{$food->pivot->price}}</b>
                <a><i ng-click='RVC.addToCart(food)' class="large add square icon"></i></a>
              </div>
              <div class="content">
                <div class="header">{{$food->name}}</div>
                {{$food->description}}
              </div>

            </div>
            <div class="ui divider"></div>
          </div>
        @endforeach
      </div>
    </div>
    <div class="five wide column" >
      @include('partials.cart')
    </div>
    </div></div>
@stop

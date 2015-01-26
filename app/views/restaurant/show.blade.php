@extends('layouts.default')

@section('container')
<div class='container'>
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <div class="media">
                  <div class="media-left">
                    <img class="media-object" src="{{asset('assets/img/restaurants/test.jpg')}}" alt="{{$restaurant->name}}" height='100px'>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{$restaurant->name}}</h4>
                    <ul class='list-unstyled'>
                      <li>Minimum Order: Rs.{{$restaurant->min_order}}</li>
                      <li>Delivery Time: {{$restaurant->delivery_time}} min</li>
                    </ul>
                  </div>
                </div>
            </div>
            <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery"> Menu</h4><br/>

            <div class="col-md-12">
               <div class="list-group">
                    @foreach ($restaurant->foods as $food)
                        <i class="list-group-item">
                            <div class="navbar-right">
                                <b>{{$food->pivot->price}}</b>
                                <a class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></a>
                                &nbsp;   
                                &nbsp;   
                            </div>
                            <h5>{{$food->name}}</h5>
                            <p class="list-group-item-text">{{$food->description}}</p>
                        </i>
                    @endforeach
                </di v>
            </div>
        </div>
        <div class="col-md-3" >
            {{--@include('partials.cart')--}}
        </div>
    </div>
</div>
@stop

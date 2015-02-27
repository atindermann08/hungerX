@extends('layouts.default')

@section('container')
<div class='container-fluid'>
    <div class="row">
        <div class="col-md-8">
            <div class="page-header">
                <div class="media">
                  <div class="media-left">
                    {{ HTML::image(asset('assets/img/restaurants/'.$restaurant->id.'.jpg'), $restaurant->name, ['height' => '100px', 'class'=>'img-circle'])}}
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">{{$restaurant->name}}</h4>
                    <ul class='list-unstyled'>
                      <li>Minimum Order: &#8377; {{$restaurant->min_order}}</li>
                      <li>Delivery Time: {{$restaurant->delivery_time}} min</li>
                    </ul>
                  </div>
                </div>
            </div>
            <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery"> Menu</h4>

            <div class="col-md-12">
                    <div class="navbar-right"><b></b></div><p class="list-group-item-text"></p><hr>
                    @foreach ($restaurant->foods as $food)
                    <div class="col-md-5 col-md-offset-1">
                            <div class="navbar-right">
                                {{ Form::open(['url' => route('cart.add')]) }}
                                   <b>&#8377; {{$food->pivot->price}}</b>
                                    {{ Form::hidden('qty', 1) }}
                                    {{ Form::hidden('id', $food->id) }}
                                    {{ Form::hidden('restaurant_id', $restaurant->id) }}
                                    <button type='submit' class="btn btn-success btn-xs">
                                        <i class="glyphicon glyphicon-plus"></i>
                                    </button>
                                {{ Form::close() }}
                            </div>
                            <h5>{{$food->name}}</h5>
                                <p class="list-group-item-text">
                                    {{$food->description}}
                                </p>
                            <hr>
                          </div>
                    @endforeach
            </div>
        </div>
        <div class="col-md-4" >
            @include('partials._cart')
        </div>
    </div>
</div>
@stop

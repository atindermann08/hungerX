@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Edit Restaurant Delivery Areas</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('admin.restaurants.index') }}">Restaurants</a></li>
      <li><a href="{{ route('admin.restaurants.show', $restaurant->id) }}">Restaurant Details</a></li>
      <li class="active">Delivery Areas</li>
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

      <div class="col-md-12">
        <h4 class="col-md-12 text-center glyphicon glyphicon-cutlery">
          Menu
        </h4>
        <table class="table table-striped table-hover">
          <tr>
            <th>Area</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Action</th>
          </tr>
          <tr>
            {{ Form::open([
              'url' => route('admin.restaurants.delivery_areas.add', $restaurant->id),
              'method' => 'POST'
              ])}}
              <td>
                {{
                  Form::select(
                  'area_id',
                  $deliveryAreas,
                  null ,
                  array("class" => "form-control")
                  );
                }}
              </td>
              <td> {{ Form::select('city_id', $cities, $restaurant->area->city->id, ['class' => "form-control", 'disabled' => 'disabled' ]) }} </td>
              <td> {{ Form::select('state_id', $states, $restaurant->area->city->state->id, ['class' => "form-control", 'disabled' => 'disabled' ]) }}  </td>
              <td> {{ Form::select('country_id', $countries, $restaurant->area->city->state->country->id, ['class' => "form-control", 'disabled' => 'disabled' ]) }} </td>
              <td> {{ Form::submit('Add to Delivery Areas', ['class' => 'btn btn-primary btn-block']) }}</td>
              {{ Form::close() }}
            </tr>
            @foreach($restaurant->deliveryAreas as $area)
            <tr>
              <td>
                {{$area->name}}
              </td>
              <td>
                {{$area->city->name}}
              </td>
              <td>
                {{$area->city->state->name}}
              </td>
              <td>
                {{$area->city->state->country->name}}
              </td>
              <td>
                {{ Form::open(
                  array(
                  'method' => 'DELETE',
                  'url' => route('admin.restaurants.delivery_areas.remove',[$restaurant->id, $area->id]),
                  'class' => 'form-inline'))}}
                  {{ Form::submit('Remove from Delivery Areas', array('class' => 'btn btn-link'))}}
                {{ Form::close()}}
              </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
    @stop

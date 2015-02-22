@extends('admin.layouts.default')

@section('container')

    <h2>Edit Restaurant details</h2>
    <hr>
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

    {{ Form::model($restaurant,
      array(
      'route' => ['admin.restaurants.update', $restaurant->id],
      'method' => 'PUT',
      'class' => 'page-header',
      'files' => true
      )) }}
    <div class="form-group">
      {{ Form::label('name') }}
      {{ Form::text('name', null, ['class' =>"form-control"]) }}
    </div>
    <div class="form-group">
      {{ Form::label('description') }}
      {{ Form::textarea('description', null, ['class' =>"form-control"]) }}
    </div>
    <div class="form-group">
      {{ Form::label('city_id','City') }}
      {{ Form::select(
        'city_id',
        $cities,
        null ,
        array("class" => "form-control")) }}
      </div>
      <div class="form-group">
        {{ Form::label('area_id', 'Area') }}
        {{ Form::select(
          'area_id',
          $areas,
          null ,
          array("class" => "form-control")) }}
        </div>
        <div class="form-group">
          {{ Form::label('min_order') }}
          {{ Form::text('min_order', null, ['class' =>"form-control"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('delivery_fee') }}
          {{ Form::text('delivery_fee', null, ['class' =>"form-control"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('delivery_time') }} <small>(In minutes)</small>
          {{ Form::text('delivery_time', null, ['class' =>"form-control"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('order_start_time') }}
          {{ Form::text('order_start_time', null, ['class' =>"form-control"]) }}
        </div>
        <div class="form-group">
          {{ Form::label('order_stop_time') }}
          {{ Form::text('order_stop_time', null, ['class' =>"form-control"]) }}
        </div>
        <div class="form-group">
          <label class='checkbox-inline'>
            {{ Form::checkbox('online_payment', true, Input::old('online_payment', true)) }} Online Payment
          </label>
          <label class='checkbox-inline'>
            {{ Form::checkbox('cash_on_delivery', true, Input::old('cash_on_delivery', true)) }}
            Cash on Delivery
          </label>
          <label class='checkbox-inline'>
            {{ Form::checkbox('preorder', true, Input::old('preorder', true)) }}
            Preorder Available
          </label>
          <label class='checkbox-inline'>
            {{ Form::checkbox('pickup', true, Input::old('pickup', true)) }}
            Pickup Available
          </label>
          <label class='checkbox-inline'>
            {{ Form::checkbox('pure_veg', true, Input::old('pure_veg', false)) }}
            Pure Veg
          </label>
          <label class='checkbox-inline'>
            {{ Form::checkbox('active', true, Input::old('active', true)) }}
            Active
          </label>
        </div>
        <div class="form-group">
          {{ HTML::image(asset('assets/img/restaurants/'.$restaurant->id.'.jpg'), $restaurant->name, ['height' => '100px', 'class'=>'img-circle'])}}
        </div>
        <div class="form-group">
          {{ Form::label('image', 'Change image') }}
          {{ Form::file('image') }}
        </div>
        <div class="form-group">
          {{ Form::submit('Add', ['class' => 'btn btn-primary btn-block']) }}
        </div>
        {{ Form::close() }}

    @stop

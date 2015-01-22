@extends('layouts.default')

@section('container')
  <div class="ui form segment location-selector">
    <div class="two fields">
        <div class="field">
          {{ Form::open(array('route' => 'select.area')) }}
            <label for="city">Select City</label>
            {{Form::select('city', array('-1' => 'Please select...') + $cities,  null, array("onchange" => "this.form.submit()"))}}
          {{ Form::close() }}

        </div>
        <div class="field">
          <label for="area">Select Area</label>
          {{ Form::open(array('route' => 'restaurants.list'))}}
            {{Form::select('area', array('-1' => 'Please select...') + $areas,  null, array("onchange" => "this.form.submit()"))}}
          {{ Form::close() }}
        </div>

    </div>
  </div>
@stop

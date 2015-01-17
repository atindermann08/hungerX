@extends('layouts.default')

@section('container')
  <div class="ui form segment location-selector">
    <div class="two fields">
        <div class="field">
          {{ Form::open(array('route' => 'select.area', 'name' => "frm_select_city")) }}
            <label for="city">Select City</label>
            {{Form::select('city', array('-1' => 'Please select...') + $cities,  null, array("onchange" => "document.frm_select_city.submit()"))}}
          {{ Form::close() }}

        </div>
        <div class="field">
          <label for="area">Select Area</label>
          {{ Form::open(array('route' => 'restaurants.list', 'name' => "frm_select_city")) }}
            {{Form::select('area', $areas)}}
          {{ Form::close() }}
        </div>

    </div>
  </div>
@stop

@extends('layouts.default')

@section('container')
<div class="row">
    <div class="col-xs-12">
        <div class="location-selector">
            <div class="ls-control">
                {{ Form::open(array('route' => 'select.area', 'class' => 'col-md-6')) }}

                    <div class="form-group">

                        {{ Form::label('city', 'Select City') }}
                        {{ Form::select(
                            'city', 
                            array('-1' => 'Please select City...') + $cities,  
                            $selectedCity , 
                            array(
                            "onchange" => "this.form.submit()",
                            "class" => "form-control"
                        )) }}

                    </div>

                {{ Form::close() }}


                {{ Form::open(array('route' => 'restaurant.index', 'class' => 'col-md-6'))}}

                    <div class="form-group">

                        {{ Form::label('area', 'Select Area') }}
                        {{ Form::select(
                            'area', 
                            array('-1' => 'Please select Area...') + $areas,  
                            null, 
                            array(
                            "onchange" => "this.form.submit()",
                            "class" => "form-control"
                        )) }}

                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop

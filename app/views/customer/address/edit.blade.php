@extends('layouts.default')

@section('container')
   <div class="row">
        <div class='col-md-4 col-md-offset-4'>
            {{ Form::model($address, 
                   array(
                          'route' => ['customer.address.doEdit', $address->id],
                          'class' => 'page-header'
                       )) }}   
                <fieldset>
                    <div class="form-group">
                        <!-- name -->
                        {{ Form::label('name', 'Address Name') }}
                        {{ Form::text('name', Input::old('name'), ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('country', 'Country') }}
                        {{ Form::select('country', $countries, $address->area->city->state->country->id , ['class' => "form-control", 'disabled' => 'disabled' ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('state', 'State') }}
                        {{ Form::select('state', $states , $address->area->city->state->id , ['class' => "form-control", 'disabled' => 'disabled' ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('city', 'City') }}
                        {{ Form::select(
                            'city', 
                            $cities,  
                            $address->area->city->id, 
                            array(
                            "onchange" => "this.form.submit()",
                            "class" => "form-control"
                        )) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('area', 'Area') }}
                        {{ Form::select(
                            'area', 
                            $areas,  
                            $address->area->id, 
                            ["class" => "form-control"]
                           ) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('house_no', 'House No') }}
                        {{ Form::text('house_no', Input::old('house_no'), ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('landmark', 'Landmark') }}
                        {{ Form::text('landmark', Input::old('landmark'), ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        <!-- email -->
                        {{ Form::label('pin_code', 'Pin Code') }}
                        {{ Form::text('pin_code', Input::old('pin_code'), ['class' => "form-control" ]) }}    
                    </div>
                    <div class="form-group">  
                        @if ($errors->has())
                            <div class="alert alert-error alert-danger">
                                <p>Errors occurred.</p>
                                <ul>
                                	@foreach($errors->all() as $error)
                                		<li>{{ $error }}</li>
                                	@endforeach
								</ul>
                            </div>
                        @endif
                        
                         @if (Session::get('error'))
                            <div class="alert alert-error alert-danger">
                                @if (is_array(Session::get('error')))
                                    {{ head(Session::get('error')) }}
                                @else
                                    {{{ Session::get('error') }}}
                                @endif
                            </div>
                        @endif

                        @if (Session::get('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        {{ Form::submit('Update Address', ['class' => "btn btn-block btn-warning" ]) }}
                    </div>

            {{ Form::close() }}
       </div>
    </div>
@stop

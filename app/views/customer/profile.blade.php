@extends('layouts.default')

@section('container')
   <div class="row">
        <div class='col-md-4 col-md-offset-4'>
            {{ Form::model($user, 
                   array(
                          'route' => ['customer.profile.doUpdate', $user->id],
                          'class' => 'page-header'
                       )) }}    
                <fieldset>
                    <div class="form-group">
                        <!-- name -->
                        {{ Form::label('firstname', 'First Name') }}
                        {{ Form::text('firstname', null, ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('lastname', 'Last Name') }}
                        {{ Form::text('lastname', null, ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('mobile', 'Mobile') }}
                        {{ Form::text('mobile', null, ['class' => "form-control" ]) }}
                    </div>
                    <div class="form-group">
                        <!-- email -->
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, ['class' => "form-control" ]) }}    
                    </div>
                    <div class="form-group">  
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
                        {{ Form::submit('Update Profile', ['class' => "btn btn-warning btn-block" ]) }}
                    </div>

            {{ Form::close() }}
       </div>
    </div>
@stop

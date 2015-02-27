@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Profile</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="active">Profile</li>
</ol>
<hr>
<div class="col-md-12">
  {{ Form::model($user,
    array(
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

      </div>

      {{ Form::close() }}

</div>
@stop

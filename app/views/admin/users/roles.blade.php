@extends('admin.layouts.default')

@section('container')
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="active">Roles</li>
  </ol>

    <h2>Roles</h2>
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

    {{ Form::open(array('url' => route('admin.roles.store'), 'class' => 'form-inline')) }}
    {{ Form::label('name') }}
    {{ Form::text('name', null, array("class" => "form-control")) }}
    {{ Form::submit('Add Role', array('class' => 'form-control btn btn-primary')) }}
    {{ Form::close() }}
    <hr>
    <ul>
      @foreach($roles as $role)
      <li>
        {{ Form::open(
          array(
          'method' => 'DELETE',
          'url' => route('admin.roles.destroy', $role->id),
          'class' => 'form-inline'))}}
          {{ $role->name }}
          {{ Form::submit('Delete', array('class' => 'btn btn-link'))}}
          {{ Form::close()}}
        </li>
        @endforeach
      </ul>
      <hr>


      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  @stop

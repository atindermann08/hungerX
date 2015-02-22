@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Permissions</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="active">Permissions</li>
</ol>
<hr>

    @if($errors->has())
    <div class="alert alert-warning alert-dismissible" permission="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning!</strong> Following errors occured
      <ul>
        @foreach($errors->all() as $error)
        <li> {{ $error }}  </li>
        @endforeach
      </ul>
    </div>
    @endif

    {{ Form::open(array('url' => route('admin.permissions.store'), 'class' => 'form-inline')) }}
      {{ Form::label('name') }}
      {{ Form::text('name', null, array("class" => "form-control", "placeholder"=>"e.g, edit_menu")) }}
      {{ Form::label('display_name') }}
      {{ Form::text('display_name', null, array("class" => "form-control", "placeholder"=>"e.g, Edit menu")) }}
    {{ Form::submit('Add permission', array('class' => 'form-control btn btn-primary')) }}
    {{ Form::close() }}
    <hr>
    <ul>
      @foreach($permissions as $permission)
      <li>
        {{ Form::open(
          array(
          'method' => 'DELETE',
          'url' => route('admin.permissions.destroy', $permission->id),
          'class' => 'form-inline'))}}
          {{ $permission->display_name }}({{ $permission->name }})
          {{ Form::submit('Delete', array('class' => 'btn btn-link'))}}
          {{ Form::close()}}
        </li>
        @endforeach
      </ul>
      <hr>


      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

  @stop

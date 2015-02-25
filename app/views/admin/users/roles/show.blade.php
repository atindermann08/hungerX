@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">{{ $role->name }}</h1>
<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li><a href="{{ route('admin.roles.index') }}">Roles</a></li>
  <li class="active">{{ $role->name }}</li>
</ol>
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
<table class="table table-striped table-hover">
  <tr>
    <th>Permissions</th>
    <th>Actions</th>
  </tr>
  <tr>
    {{ Form::open([
      'url' => route('admin.roles.update'),
      'method' => 'PUT'
      ])}}
      <td> {{ Form::select('permission_id', $permissions, null, ['class' => "form-control" ]) }} </td>
      <td> {{ Form::submit('Add Persmission to Role', ['class' => 'btn btn-warning btn-block']) }}</td>
      {{ Form::close() }}
    </tr>
    @foreach($role->permissions as $permission)
    <tr>
      <td>
        {{$permission->name}}
      </td>
      <td>
        {{ $permission->display_name }}
      </td>
      <td>
        {{ Form::open(
          array(
          'method' => 'DELETE',
          'url' => route('admin.roles.permission.destroy', [$role->id, $permission->id]),
          'class' => 'form-inline'))}}
          {{ Form::submit('Remove Permission from Role', array('class' => 'btn btn-danger btn-block'))}}
          {{ Form::close()}}
        </td>
      </tr>
      @endforeach
    </table>
    @stop

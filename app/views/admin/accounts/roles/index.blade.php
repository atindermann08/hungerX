@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Roles</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="active">Roles</li>
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
        <th>Role</th>
        <th>Permissions</th>
        <th colspan="2">Actions</th>
      </tr>
      <tr>
        {{ Form::open([
          'url' => route('admin.roles.store'),
          'method' => 'POST'
          ])}}
          <td>
            {{ Form::text('name', null, array("class" => "form-control", "placeholder" => "e.g User")) }}
          </td>
          <td> {{ Form::select('permission_id', $permissions, null, ['class' => "form-control" ]) }} </td>
          <td colspan="2"> {{ Form::submit('Add Role', ['class' => 'btn btn-warning btn-block']) }}</td>
          {{ Form::close() }}
        </tr>
        @foreach($roles as $role)
        <tr>
          <td>
            {{$role->name}}
          </td>
          <td>
            @foreach($role->perms as $index =>  $permission)
              @if ($index != 0)
              ,
              @endif
              {{ $permission->display_name }}
            @endforeach
          </td>
          <td>
            <a href="{{ route('admin.roles.show', $role->id) }}" class="btn btn-primary btn-block">Manage Permissions</a>
          </td>
          <td>
            {{ Form::open(
              array(
              'method' => 'DELETE',
              'url' => route('admin.roles.destroy',$role->id),
              'class' => 'form-inline'))}}
              {{ Form::submit('Delete Role', array('class' => 'btn btn-danger btn-block'))}}
              {{ Form::close()}}
            </td>
          </tr>
          @endforeach
        </table>
  @stop

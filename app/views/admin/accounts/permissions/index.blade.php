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
    <table class="table table-striped table-hover">
      <tr>
        <th>Permission</th>
        <th>Permission Display Name</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
      <tr>
        {{ Form::open([
          'url' => route('admin.permissions.store'),
          'method' => 'POST'
          ])}}
          <td>
            {{ Form::text('name', null, array("class" => "form-control", "placeholder" => "e.g can_view_data")) }}
          </td>
          <td>
            {{ Form::text('display_name', null, array("class" => "form-control", "placeholder" => "e.g Can View Data")) }}
          </td>
          <td> {{ Form::select('role_id', $roles, null, ['class' => "form-control" ]) }} </td>
          <td> {{ Form::submit('Add Permission', ['class' => 'btn btn-primary btn-block']) }}</td>
          {{ Form::close() }}
        </tr>
        @foreach($permissions as $permission)
        <tr>
          <td>
            {{$permission->name}}
          </td>
          <td>
            {{$permission->display_name}}
          </td>
          <td>
            @foreach($permission->roles as $index =>  $role)
              @if ($index != 0)
                ,
              @endif
              {{ $role->name }}
            @endforeach
          </td>
          <td>
            {{ Form::open(
              array(
              'method' => 'DELETE',
              'url' => route('admin.permissions.destroy',$permission->id),
              'class' => 'form-inline'))}}
              {{ Form::submit('Delete Permission', array('class' => 'btn btn-link'))}}
              {{ Form::close()}}
            </td>
          </tr>
          @endforeach
        </table>
  @stop

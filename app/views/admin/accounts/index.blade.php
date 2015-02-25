@extends('admin.layouts.default')

@section('container')

<h1 class="page-header">
  Accounts
  <a href='{{ route("admin.accounts.create") }}' class="btn btn-primary pull-right" disabled>Create New Account</a>
</h1>

<ol class="breadcrumb">
  <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
  <li class="active">Accounts</li>
</ol>
<hr>

<div class="col-lg-12">
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

  <!-- make all table rows clickable using jquery data-href or similar and remove a links-->
  <table class="table table-striped table-hover">

    {{ Form::open([
      'url' => route('admin.accounts.store'),
      'method' => 'POST'
      ])}}
      <tr>
        <th colspan='2'>{{ Form::text('firstname', null, array("class" => "form-control","placeholder"=>"First Name")) }}</th>
        <th>{{ Form::text('lastname', null, array("class" => "form-control","placeholder"=>"Last Name")) }}</th>
        <th>{{ Form::text('mobile', null, array("class" => "form-control","placeholder"=>"Mobile")) }}</th>
        <th colspan='3'>{{ Form::text('email', null, array("class" => "form-control","placeholder"=>"Email")) }}</th>

        <th rowspan='2' colspan='2'>{{ Form::submit('Create', ['class' => 'btn btn-primary btn-block ']) }}</th>
    </tr>
    <tr>
        <th colspan='2'>{{ Form::password('password', array("class" => "form-control","placeholder"=>"Password")) }}</th>
        <th colspan='2'>{{ Form::password('password_confirmation', array("class" => "form-control","placeholder"=>"Confirm Password")) }}</th>
        <th colspan='2'>{{ Form::select('role_id', $roles, 5 , ['class' => "form-control" ]) }}</th>
        <th>
          <label class='checkbox-inline'>
            {{ Form::checkbox('confirmed', true, Input::old('active', true)) }}
            Confirm?
          </label>
        </th>

    </tr>
    {{ Form::close() }}
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Mobile</th>
      <th>Email</th>
      <th>Addresses</th>
      <th>Roles</th>
      <th>Confirmed</th>
      <th colspan='2'>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
      <td>
        {{ $user->firstname }}
      </td>
      <td>
        {{ $user->lastname }}
      </td>
      <td>
        {{ $user->mobile }}
      </td>
      <td>
        {{ $user->email }}
      </td>
      <td>
        {{ count($user->addresses) }}
      </td>
      <td>
        @foreach($user->roles as $index =>  $role)
          @if ($index != 0)
            ,
          @endif
          {{ $role->name }}
        @endforeach
      </td>
      <td>
        @if($user->confirmed)
          <a href="#">Yes</a>
        @else
          <a href="#">No</a>
        @endif
      </td>
      <td>
        <a href="{{ route('admin.accounts.show', $user->id) }}" class='btn btn-primary'>Manage</a>
      </td>
      <td>{{ Form::open(
        array(
        'method' => 'DELETE',
        'url' => route('admin.accounts.destroy', $user->id),
        'class' => 'form-inline')) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
  </table>
  <hr>
</div>
@stop

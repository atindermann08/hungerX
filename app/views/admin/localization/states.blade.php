@extends('admin.layouts.default')

@section('container')

    <h1 class="page-header">States</h1>
    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="active">States</li>
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
          <th>State</th>
          <th>Country</th>
          <th>Action</th>
        </tr>
        <tr>
          {{ Form::open([
            'url' => route('admin.states.store'),
            'method' => 'POST'
            ])}}
            <td>
              {{ Form::text('name', null, array("class" => "form-control")) }}
            </td>
            <td> {{ Form::select('country_id', $countries, null, ['class' => "form-control" ]) }} </td>
            <td> {{ Form::submit('Add State', ['class' => 'btn btn-primary btn-block']) }}</td>
            {{ Form::close() }}
          </tr>
          @foreach($states as $state)
          <tr>
            <td>
              {{$state->name}}
            </td>
            <td>
              {{$state->country->name}}
            </td>
            <td>
              {{ Form::open(
                array(
                'method' => 'DELETE',
                'url' => route('admin.states.destroy',$state->id),
                'class' => 'form-inline'))}}
                {{ Form::submit('Delete State', array('class' => 'btn btn-link'))}}
                {{ Form::close()}}
              </td>
            </tr>
            @endforeach
          </table>

@stop

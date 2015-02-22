@extends('admin.layouts.default')

@section('container')
  <h1 class="page-header">Foods</h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="active">Foods</li>
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
        <th>Food</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
      <tr>
        {{ Form::open([
          'url' => route('admin.foods.store'),
          'method' => 'POST'
          ])}}
          <td>
            {{ Form::text('name', null, array("class" => "form-control")) }}
          </td>
          <td> {{ Form::select('category_id', $categories, null, ['class' => "form-control" ]) }} </td>
          <td> {{ Form::submit('Add Food', ['class' => 'btn btn-primary btn-block']) }}</td>
          {{ Form::close() }}
        </tr>
        @foreach($foods as $food)
        <tr>
          <td>
            {{$food->name}}
          </td>
          <td>
            {{$food->category->name}}
          </td>
          <td>
            {{ Form::open(
              array(
              'method' => 'DELETE',
              'url' => route('admin.foods.destroy',$food->id),
              'class' => 'form-inline'))}}
              {{ Form::submit('Delete Food', array('class' => 'btn btn-link'))}}
              {{ Form::close()}}
            </td>
          </tr>
          @endforeach
        </table>


    @stop

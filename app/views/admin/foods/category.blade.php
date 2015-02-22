@extends('admin.layouts.default')

@section('container')
<h1 class="page-header">Categories</h1>

    <ol class="breadcrumb">
      <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
      <li class="active">Categories</li>
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
        <th>Category</th>
        <th>Action</th>
      </tr>
      <tr>
        {{ Form::open([
          'url' => route('admin.categories.store'),
          'method' => 'POST'
          ])}}
          <td>
            {{ Form::text('name', null, array("class" => "form-control")) }}
          </td>
          <td> {{ Form::submit('Add Category', ['class' => 'btn btn-primary btn-block']) }}</td>
          {{ Form::close() }}
        </tr>
        @foreach($categories as $category)
        <tr>
          <td>
            {{$category->name}}
          </td>
          <td>
            {{ Form::open(
              array(
              'method' => 'DELETE',
              'url' => route('admin.categories.destroy',$category->id),
              'class' => 'form-inline'))}}
              {{ Form::submit('Delete Category', array('class' => 'btn btn-link'))}}
              {{ Form::close()}}
            </td>
          </tr>
          @endforeach
        </table>

  @stop

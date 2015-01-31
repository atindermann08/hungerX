@extends('layouts.default')

@section('container')
   <div class="row">
        <div class='col-md-4 col-md-offset-4'>
            <form method="POST" action="{{{ route('customer.password.doChange',Confide::user()->id) }}}" accept-charset="UTF-8" class="page-header">
                <div class="form-group">
                    <label for="password">Current Password</label>
                    <input class="form-control" placeholder="Current Password" type="password" name="current_password" id="password">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input class="form-control" placeholder="New Password" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
                </div>
                
                
                @if (Session::get('error'))
                    <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                @endif

                @if (Session::get('notice'))
                    <div class="alert">{{{ Session::get('notice') }}}</div>
                @endif

                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </form>
       </div>
    </div>
@stop

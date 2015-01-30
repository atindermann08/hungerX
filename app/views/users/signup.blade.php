@extends('layouts.default')

@section('container')
   <div class="row">
        <div class='col-md-4 col-md-offset-4'>
            <form method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8" class="page-header">
                <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                <fieldset>
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input class="form-control" placeholder="First Name" type="text" name="firstname" id="firstname" value="{{{ Input::old('firstname') }}}">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input class="form-control" placeholder="Last Name" type="text" name="lastname" id="lastname" value="{{{ Input::old('lastname') }}}">
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile
                        <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small>
                        </label>
                        <input class="form-control" placeholder="Mobile" type="text" name="mobile" id="mobile" value="{{{ Input::old('mobile') }}}">
                    </div>
                    <div class="form-group">
                        <label for="email">
                        {{{ Lang::get('confide::confide.e_mail') }}} 
                        <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small>
                        </label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    </div>
                    <div class="form-group">
                        <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
                        <input class="form-control" placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" type="password" name="password_confirmation" id="password_confirmation">
                    </div>

                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger">
                            @if (is_array(Session::get('error')))
                                {{ head(Session::get('error')) }}
                            @endif
                        </div>
                    @endif

                    @if (Session::get('notice'))
                        <div class="alert">{{ Session::get('notice') }}</div>
                    @endif

                    <div class="form-actions form-group">
                      <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
                    </div>

                </fieldset>
            </form>
       </div>
    </div>
@stop

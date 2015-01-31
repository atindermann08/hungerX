
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span>
            </button> 
            <a class="navbar-brand" href="{{url('/')}}">Hunger Expert</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active">
                    <a href="{{route("select.city")}}">Home</a>
                </li>

                <li>
                    <a href="{{url("/blog")}}">Blog</a>
                </li>

                <li>
                    @if(!Confide::user())
                        <a href="{{route('auth.login')}}">
                        {{--<a class="btn" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">--}}
                           Sign In 
                        </a>
                </li>
                <li>
                       <a href="{{route('auth.signup')}}">
                           Sign Up
                        </a>
                    @else
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, {{ucfirst(Confide::user()->firstname)}} <span class="caret"></span></a>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('customer.profile')}}">Profile</a></li>
                            <li><a href="{{route('customer.address.index')}}">Addresses</a></li>
                            <li><a href="{{route('customer.password.change')}}">Change Password</a></li>
                            <li><a href="{{route('customer.orders')}}">Orders</a></li>
                            <li class="divider"></li>
                            <li>
                              <a href="{{route('auth.logout')}}">
                               Logout
                              </a>
                            </li>
                          </ul>
                        </li>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Button trigger modal -->

{{-- Modal
<div class="modal fade bs-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3>Have an Account?</h3>
    </div>
    <div class="modal-body">
        <div class="well">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                <li><a href="#create" data-toggle="tab">Create Account</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                    <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                        <fieldset>
                            <div class="form-group">
                                <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                                <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                            </div>
                            <div class="form-group">
                            <label for="password">
                                {{{ Lang::get('confide::confide.password') }}}
                            </label>
                            <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                            <p class="help-block">
                                <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                            </p>
                            </div>
                            <div class="checkbox">
                                <label for="remember">
                                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('confide::confide.login.remember') }}}
                                </label>
                            </div>
                            @if (Session::get('error'))
                                <div class="alert alert-error alert-danger">{{{ Session::get('error') }}}</div>
                            @endif

                            @if (Session::get('notice'))
                                <div class="alert">{{{ Session::get('notice') }}}</div>
                            @endif
                            <div class="form-group">
                                <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                            </div>
                        </fieldset>
                    </form>    
                </div>
                <div class="tab-pane fade" id="create">
                    <form id="tab">
                        <label>Username</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>First Name</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Last Name</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Email</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Address</label>
                        <textarea value="Smith" rows="3" class="input-xlarge">
                        </textarea>

                        <div>
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div id='menu' class="ui secondary pointing orange inverted menu" data-ng-controller="HeaderController as HC">
  <a href="#" class='header item' >
    <i class="icon-logo large-logo"></i><span class="logo-header">HungerExpert</span>
  </a>
  <div class='ui secondary pointing labeled icon right menu'>
    <a class="active item" href="/#"  data-ng-hide="HC.isActivePath('/login')||HC.isActivePath('/register')" >
      <i class="home icon"></i> Home
    </a>
    <a class="item" href="/blog"  data-ng-hide="HC.isActivePath('/login')||HC.isActivePath('/register')">
      <i class="food icon"></i> Blog
    </a>
    <a class="item" href="#/login"  data-ng-hide="HC.isActivePath('/login')||HC.isActivePath('/register')">
      <i class="user icon"></i> Login
    </a>
  </div>
  <div class='ui secondary text right menu' data-ng-show="HC.isActivePath('/login')">

    <div class="active item">
      Don't have an expert account yet!
      <a class="ui green submit button" href="#/register"> Create Account </a>
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
  </div>
  <div class='ui secondary text right menu' data-ng-show="HC.isActivePath('/register')">

    <div class="active item">
      <a class="ui green submit button" href="#/login"> Sign In </a>
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
  </div>
</div>

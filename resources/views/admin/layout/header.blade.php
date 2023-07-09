<!-- Header-->
<header id="header" class="header">
  <div class="header-menu">

    <div class="col-sm-7">
    </div>

    <div class="col-sm-5">
      <div class="user-area dropdown float-right">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="user-avatar rounded-circle" src="{{ asset('user/images/' . Auth()->user()->pfp) }}" alt="User Avatar">
        </a>

        <div class="user-menu dropdown-menu">
          <a class="nav-link" href="{{route('a.profile')}}"><i class="fa fa-user"></i> Profile Saya</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
              <i class="fa fa-power-off"></i>{{ __('Log Out') }}
            </a>
          </form>
        </div>
      </div>
    </div>

  </div>
</header><!-- /header -->
<!-- Header-->
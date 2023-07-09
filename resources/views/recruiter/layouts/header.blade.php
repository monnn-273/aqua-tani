<!-- NAVBAR -->
<header class="site-navbar mt-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="site-logo col-6"><a href="/">Aqua Tani</a></div>

            @include('recruiter.layouts.navbar')
            
            <div class="right-cta-menu text-right d-flex align-items-center col-6">
                @guest
                    <div class="ml-auto">
                        <a href="/register-as-recruiter" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Jadi Recruiter</a>
                        <a href="/login" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Masuk</a>
                    </div>
                @else 
                    <div class="ml-auto d-flex align-items-center">
                        @if(request()->is('recuiter/profile'))
                          <a href="{{route('r.profile')}}" class="btn btn-active btn-primary border-width-2 d-none d-lg-inline-block"><i class="fa fa-user"></i> Profile </a>
                        @else
                          <a href="{{route('r.profile')}}" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><i class="fa fa-user"></i> Profile </a>
                        @endif
                        &nbsp;
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" class="btn btn-primary border-width-2 d-none d-lg-inline-block" onclick="event.preventDefault();this.closest('form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                @endguest
                <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
            </div>
        </div>
    </div>
</header>
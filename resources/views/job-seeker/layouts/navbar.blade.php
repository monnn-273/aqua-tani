<nav class="mx-auto site-navigation">
  <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
    <li><a href="{{route('u.homepage')}}" class="nav-link {{ request()->is('user/beranda') ? 'active' : ''}}">Beranda</a></li>
    <li><a href="{{route('u.vacancies')}}" class="nav-link {{ request()->is('user/lowongan') || request()->is('user/lowongan/*') || request()->is('user/lowongan-pertanian') || request()->is('user/lowongan-perikanan') ? 'active' : ''}}">Semua Lowongan</a></li>
    <li><a href="{{route('u.applications')}}" class="nav-link {{ request()->is('user/lamaran') || request()->is('user/lamaran/*') ? 'active' : ''}}">Lamaran Saya</a></li>
    <li><a href="{{route('u.notifications')}}" class="nav-link {{ request()->is('user/notifikasi') ? 'active' : ''}}">Notifikasi @if($unread_notif > 0)({{ $unread_notif }})@endif</a></li>
  </ul>
</nav>

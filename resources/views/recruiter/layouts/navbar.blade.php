<nav class="mx-auto site-navigation">
    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
    <li><a href="{{route('r.homepage')}}" class="nav-link  {{ request()->is('recruiter/beranda') ? 'active' : ''}}">Beranda</a></li>
    <li><a href="{{route('r.show_vacancies')}}" class="nav-link  {{ request()->is('recruiter/kelola-lowongan') ? 'active' : ''}}">Kelola Lowongan</a></li>
    <li><a href="{{route('r.show_applications')}}" class="nav-link  {{ request()->is('recruiter/kelola-lamaran') ? 'active' : ''}}">Kelola Lamaran</a></li>
    <li><a href="{{route('r.notifications')}}" class="nav-link {{ request()->is('recruiter/notifikasi') ? 'active' : ''}}">Notifikasi @if($unread_notif > 0)({{ $unread_notif }})@endif</a></li>
    </ul>
</nav>
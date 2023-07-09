<nav class="mx-auto site-navigation">
  <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
    <li><a href="/" class="nav-link @if(request()->is('/')) active @endif">Beranda</a></li>
    <li><a href="{{route('g.vacancies')}}" class="nav-link @if(request()->is('lowongan') || request()->is('lowongan/*')|| request()->is('lowongan-pertanian') || request()->is('lowongan-perikanan')) active @endif">Semua Lowongan</a></li>
    <li><a href="/testimoni" class="nav-link @if(request()->is('testimoni')) active @endif">Testimoni</a></li>
    <li><a href="/tentang-kami" class="nav-link @if(request()->is('tentang-kami')) active @endif">Tentang Kami</a></li>
  </ul>
</nav>
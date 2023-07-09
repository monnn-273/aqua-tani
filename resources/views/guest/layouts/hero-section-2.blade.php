<section class="section-hero overlay inner-page bg-image" style="background-image: url('/user/images/hero_2.jpg');" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        @if(request()->is('lowongan') ||request()->is('lowongan-pertanian') || request()->is('lowongan-perikanan') )
        <h1 class="text-white font-weight-bold">Lowongan Pekerjaan</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Lowongan Pekerjaan</strong></span>
        </div>
        @endif
        @if(request()->is('testimoni'))
        <h1 class="text-white font-weight-bold">Testimoni</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Testimoni</strong></span>
        </div>
        @endif
        @if(request()->is('tentang-kami'))
        <h1 class="text-white font-weight-bold">Testimoni</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Tentang Kami</strong></span>
        </div>
        @endif
        @if(request()->is('register'))
        <h1 class="text-white font-weight-bold">Register</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Register</strong></span>
        </div>
        @endif
        @if(request()->is('register-as-recruiter'))
        <h1 class="text-white font-weight-bold">Daftar</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Daftar sebagai Recruiter</strong></span>
        </div>
        @endif
        @if(request()->is('login'))
        <h1 class="text-white font-weight-bold">Masuk</h1>
        <div class="custom-breadcrumbs">
          <a href="/">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Masuk</strong></span>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>
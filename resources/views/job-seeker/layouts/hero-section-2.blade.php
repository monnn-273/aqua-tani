<section class="section-hero overlay inner-page bg-image" style="background-image: url('/user/images/hero_1.jpg');" id="home-section">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        @if(request()->is('/recruiter/pekerjaan'))
        <h1 class="text-white font-weight-bold">Buat Lowongan</h1>
        <div class="custom-breadcrumbs">
          <a href="{{__('r.homepage')}}">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Buat Lowongan Baru</strong></span>
        </div>
        @endif

        @if(request()->is('/recruiter/kelola-lowongan') || request()->is('/recruiter/kelola-lowongan/*'))
        <h1 class="text-white font-weight-bold">Kelola Lowongan</h1>
        <div class="custom-breadcrumbs">
          <a href="{{__('r.homepage')}}">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Kelola Lowongan</strong></span>
        </div>
        @endif

        @if(request()->is('/recruiter/notifikasi'))
        <h1 class="text-white font-weight-bold">Notifikasi</h1>
        <div class="custom-breadcrumbs">
          <a href="{{__('r.homepage')}}">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Notifikasi</strong></span>
        </div>
        @endif

        @if(request()->is('/recruiter/kelola-lamaran') || request()->is('/recruiter/kelola-lamaran/*'))
        <h1 class="text-white font-weight-bold">Kelola Lamaran</h1>
        <div class="custom-breadcrumbs">
          <a href="{{__('r.homepage')}}">Beranda</a> <span class="mx-2 slash">/</span>
          <span class="text-white"><strong>Kelola Lamaran</strong></span>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>
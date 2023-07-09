@extends('admin.layout.template')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Dashboard</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-1">
      <div class="card-body pb-0">
        <div class="dropdown float-right">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="{{route('a.partners')}}">Kelola Mitra</a>
            </div>
          </div>
        </div>
        <h4 class="mb-0">
          <span class="count">{{$partners}}</span>
        </h4>
        <p class="text-light">Mitra</p>

        <div class="chart-wrapper px-0" style="height:70px;" height="70">
          <canvas id="widgetChart1"></canvas>
        </div>

      </div>

    </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-2">
      <div class="card-body pb-0">
        <div class="dropdown float-right">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="{{route('a.applicants')}}">Kelola Data Pelamar</a>
            </div>
          </div>
        </div>
        <h4 class="mb-0">
          <span class="count">{{$candidates}}</span>
        </h4>
        <p class="text-light">Pelamar Aktif</p>

        <div class="chart-wrapper px-0" style="height:70px;" height="70">
          <canvas id="widgetChart2"></canvas>
        </div>

      </div>
    </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-3">
      <div class="card-body pb-0">
        <div class="dropdown float-right">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="{{route('a.vacancies')}}">Kelola Lowongan</a>
            </div>
          </div>
        </div>
        <h4 class="mb-0">
          <span class="count">{{$jobs}}</span>
        </h4>
        <p class="text-light">Tawaran Pekerjaan</p>

      </div>

      <div class="chart-wrapper px-0" style="height:70px;" height="70">
        <canvas id="widgetChart3"></canvas>
      </div>
    </div>
  </div>
  <!--/.col-->

  <div class="col-sm-6 col-lg-3">
    <div class="card text-white bg-flat-color-4">
      <div class="card-body pb-0">
        <div class="dropdown float-right">
          <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
            <i class="fa fa-cog"></i>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
            <div class="dropdown-menu-content">
              <a class="dropdown-item" href="{{route('a.applications')}}">Kelola Lamaran</a>
            </div>
          </div>
        </div>
        <h4 class="mb-0">
          <span class="count">{{$apps}}</span>
        </h4>
        <p class="text-light">Lamaran Terkirim</p>

        <div class="chart-wrapper px-3" style="height:70px;" height="70">
          <canvas id="widgetChart4"></canvas>
        </div>

      </div>
    </div>
  </div>
  <!--/.col-->
  <!-- PROFILE MITRA -->
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card">
      <div class="card-header">
        <strong class="card-title mb-3">Profile Saat Ini</strong>
      </div>
      <div class="card-body">
        <div class="mx-auto d-block">
          <img class="rounded-circle mx-auto d-block" src="{{ asset('/user/images/' . Auth()->user()->pfp) }}" alt="Card image cap">
          <h5 class="text-sm-center mt-2 mb-1">{{Auth()->user()->name}}</h5>
          <div class="location text-sm-center"><i class="fa fa-envelope"></i> {{Auth()->user()->email}}</div>
        </div>
        <hr>
        <div class="card-text text-sm-center">
          <a href="#"><i class="fa fa-facebook pr-1"></i></a>
          <a href="#"><i class="fa fa-twitter pr-1"></i></a>
          <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
          <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-one">
          <div class="stat-icon dib"><i class="fa fa-users text-success border-success"></i></div>
          <div class="stat-content dib">
            <div class="stat-text">Pelamar Diterima</div>
            <div class="stat-digit">{{$employed}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-one">
          <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
          <div class="stat-content dib">
            <div class="stat-text">Pengguna Baru</div>
            <div class="stat-digit">{{$new_users}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-lg-6">
    <div class="card">
      <div class="card-body">
        <div class="stat-widget-one">
          <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
          <div class="stat-content dib">
            <div class="stat-text">Lowongan Buka</div>
            <div class="stat-digit">{{$open}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div> <!-- .content -->
@endsection
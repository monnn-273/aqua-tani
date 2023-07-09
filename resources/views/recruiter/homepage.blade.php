@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section')
<section class="py-5 bg-image overlay-primary fixed overlay" id="next" style="background-image: url('/user/images/hero_1.jpg');">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2 text-white">Statistik Aqua Tani</h2>
        <p class="lead text-white">Jumlah pekerjaan yang sudah Anda tawarkan & Lamaran yang sudah Anda terima</p>
      </div>
    </div>
    <div class="row pb-0 block__19738 section-counter">
      <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <div class="d-flex align-items-center justify-content-center mb-2">
          <strong class="number" data-number="{{$posted_job}}">0</strong>
        </div>
        <span class="caption">Pekerjaan Ditawarkan</span>
      </div>

      <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <div class="d-flex align-items-center justify-content-center mb-2">
          <strong class="number" data-number="{{$app1}}">0</strong>
        </div>
        <span class="caption">Lamaran Diterima</span>
      </div>

      <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <div class="d-flex align-items-center justify-content-center mb-2">
          <strong class="number" data-number="{{$app2}}">0</strong>
        </div>
        <span class="caption">Lamaran Diproses</span>
      </div>

      <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
        <div class="d-flex align-items-center justify-content-center mb-2">
          <strong class="number" data-number="{{$app3}}">0</strong>
        </div>
        <span class="caption">Lamaran Ditolak</span>
      </div>
    </div>
  </div>
</section>

@if(session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> {{session('status')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<section class="site-section">
  <div class="container">
    @if($posted_job == 0)
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">Belum Ada Tawaran</h2><br>
        <a href="/recruiter/pekerjaan" class="btn btn-success border-width-2 d-none d-lg-inline-block"><i class="fa fa-plus"></i> Posting Tawaran Pekerjaan </a>
      </div>
    </div>
    @else
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">{{$posted_job}} Pekerjaan sudah Anda Tawarkan</h2>
      </div>
    </div>

    <ul class="job-listings mb-5">
      @foreach($listed_jobs as $listed_job)
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="{{ route ('r.vacancy', ['id' => $listed_job->id ]) }}"></a>
        <div class="job-listing-logo">
          <img src="{{ asset('/user/images/job/' . $listed_job->image) }}" alt="company_logo" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>{{$listed_job->job_title}}</h2>
            <strong>{{$listed_job->owner->name}}</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> {{$listed_job->location}}
          </div>
          <div class="job-listing-meta">
            @if($listed_job->job_status == "closed")
            <span class="badge badge-danger">{{$listed_job->job_status}}</span>
            @else
            <span class="badge badge-success">{{$listed_job->job_status}}</span>
            @endif
          </div>
        </div>
      </li>
      @endforeach
    </ul>

    <div class="row pagination-wrap">
      <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
        <span>{{ (($listed_jobs->currentPage() - 1) * $listed_jobs->perPage()) + 1 }}-
          {{ min($listed_jobs->currentPage() * $listed_jobs->perPage(), $listed_jobs->count()) }} Of {{$listed_jobs->count()}} Jobs</span>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <div class="custom-pagination ml-auto">
          @if ($listed_jobs->onFirstPage())
          <a class="prev disabled">Prev</a>
          @else
          <a href="{{ $listed_jobs->previousPageUrl() }}" class="prev">Prev</a>
          @endif

          <div class="d-inline-block">
            @foreach ($listed_jobs->getUrlRange(1, $listed_jobs->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="{{ $page == $listed_jobs->currentPage() ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
          </div>

          @if ($listed_jobs->hasMorePages())
          <a href="{{ $listed_jobs->nextPageUrl() }}" class="next">Next</a>
          @else
          <a class="next disabled">Next</a>
          @endif
        </div>
      </div>
    </div>
    @endif
  </div>
</section>
@endsection
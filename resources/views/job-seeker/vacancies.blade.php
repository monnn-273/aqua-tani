@extends('job-seeker.layouts.template')

@section('content')
@include('job-seeker.layouts.hero-section-2')
<section class="site-section bg-light block__62849">
  <div class="container">

    <!-- CATEGORY -->
    <div class="row">
      <div class="col-6 col-md-6 col-lg-6 bg-light mb-4 mb-lg-5">
        <a href="{{route('u.agriculture-vacancies')}}" class="block__16443 text-center d-block">
          <span class="custom-icon mx-auto"><span class="icon-search d-block"></span></span>
          <h3>Pertanian</h3>
          <p>Telusuri lowongan dalam kategori pertanian saja.</p>
        </a>
      </div>

      <div class="col-6 col-md-6 col-lg-6 bg-light mb-4 mb-lg-5">
        <a href="{{route('u.fishery-vacancies')}}" class="block__16443 text-center d-block">
          <span class="custom-icon mx-auto"><span class="icon-search d-block"></span></span>
          <h3>Perikanan</h3>
          <p>Telusuri lowongan dalam kategori perikanan saja.</p>
        </a>
      </div>
    </div>


    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">{{$vacancies_total}} Tawaran Pekerjaan</h2>
        <span class="badge badge-success mb-3">
          <h2>{{$available_vacancies}} Lowongan Masih Dibuka</h2>
        </span>
      </div>
    </div>

    <ul class="job-listings mb-5">
      @foreach($vacancies as $vacancy)
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="{{route('u.vacancy', ['id' => $vacancy->id ])}}"></a>
        <div class="job-listing-logo">
          <img src="{{ asset ('user/images/job/'. $vacancy->image) }}" alt="company_logo" class="img-fluid">
        </div>

        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
          <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
            <h2>{{$vacancy->job_title}}</h2>
            <strong>{{$vacancy->owner->name}}</strong>
          </div>
          <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
            <span class="icon-room"></span> {{$vacancy->location}}
          </div>
          <div class="job-listing-meta">
            @if($vacancy->job_status == "closed")
            <span class="badge badge-danger">{{$vacancy->job_status}}</span>
            @else
            <span class="badge badge-success">{{$vacancy->job_status}}</span>
            @endif
          </div>
        </div>

      </li>
      @endforeach
    </ul>

    <div class="row pagination-wrap">
      <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
        <span>Showing 1-25 Of {{$vacancies_total}} Jobs</span>
      </div>
      <div class="col-md-6 text-center text-md-right">
        <div class="custom-pagination ml-auto">
          @if ($vacancies->onFirstPage())
          <a class="prev disabled">Prev</a>
          @else
          <a href="{{ $vacancies->previousPageUrl() }}" class="prev">Prev</a>
          @endif

          <div class="d-inline-block">
            @foreach ($vacancies->getUrlRange(1, $vacancies->lastPage()) as $page => $url)
            <a href="{{ $url }}" class="{{ $page == $vacancies->currentPage() ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
          </div>

          @if ($vacancies->hasMorePages())
          <a href="{{ $vacancies->nextPageUrl() }}" class="next">Next</a>
          @else
          <a class="next disabled">Next</a>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section-2')
<section class="site-section bg-light block__62849">
  <div class="container">

    <!-- main content title -->
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">{{$results->count()}} Hasil Pencarian</h2>
        <span class="badge badge-success mb-3">
          <h2>{{$results->where('job_status', 'open')->count()}} Lowongan Masih Dibuka</h2>
        </span>
      </div>
    </div>
    <!-- end of main content title -->

    <!-- job list -->
    <ul class="job-listings mb-5">
      @foreach($results as $listed_job)
      <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
        <a href="{{route('g.vacancy', ['id'=>$listed_job->id])}}"></a>
        <div class="job-listing-logo">
          <img src="{{ asset('user/images/job/' . $listed_job->image) }}" alt="company_logo" class="img-fluid">
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
    <!-- end of job list -->
    <div class="row mb-5">
      <div class="col-12">
        <a href="{{ url()->previous() }}" class="btn btn-block btn-success btn-md"><span class="fa fa-mail-reply"></span> Kembali</a>
      </div>
    </div>

  </div>
</section>
@endsection
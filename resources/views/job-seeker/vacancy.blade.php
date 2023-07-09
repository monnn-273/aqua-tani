@extends('job-seeker.layouts.template')

@section('content')
@include('job-seeker.layouts.hero-section-2')
<section class="site-section">
  <div class="container">
    <div class="row align-items-center mb-5">
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="d-flex align-items-center">
          <div class="border p-2 d-inline-block mr-3 rounded">
            <img src="/user/images/{{$vacancy->owner->pfp}}" alt="Image" style="width:150px; height:150px">
          </div>
          <div>
            <h2>{{$vacancy->job_title}}</h2>
            <div>
              <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{$vacancy->owner->name}}</span>
              <span class="m-2"><span class="icon-room mr-2"></span>{{$vacancy->owner->address}}</span>
              <span class="m-2"><span class="icon-clock-o mr-2"></span><span class="text-primary">{{$vacancy->job_type}}</span></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-12">
            @php
            $applied = false;
            @endphp
            @foreach($vacancy->applications as $application)
            @if($application->applicant_id == Auth()->user()->id)
            @php
            $applied = true;
            @endphp
            <a href="" class="btn btn-block btn-primary btn-md"><i class="fa fa-check-circle"></i>&nbsp;Sudah Didaftar</a>
            @break
            @endif
            @endforeach

            @unless($applied)
            @if($vacancy->job_status == "open")
            <form action="{{route('u.apply')}}" method="POST">
              @csrf
              <input type="hidden" name="applicant_id" value="{{Auth()->user()->id}}">
              <input type="hidden" name="company_id" value="{{$vacancy->owner->id}}">
              <input type="hidden" name="job_id" value="{{$vacancy->id}}">
              <button class="btn btn-block btn-primary-cs btn-md" type="submit" onclick="return confirm('Apakah Anda yakin melamar pekerjaan ini?')"><i class="fa fa-paper-plane"></i> Daftar Sekarang</button>
            </form>
            @else
            <button class="btn btn-block btn-danger-cs btn-md" type="submit"><i class="fa fa-ban" disabled></i> &nbsp;Sudah Tutup</button>
            @endif
            @endunless

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="mb-5">
          <figure class="mb-5"><img src="/user/images/job/{{$vacancy->image}}" alt="Image" class="img-fluid rounded"></figure>
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-align-left mr-3"></span>Deskripsi Pekerjaan</h3>
          {!! $vacancy->job_description !!}
        </div>
        @if($vacancy->responsibilities != null)
        <div class="mb-5">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-rocket mr-3"></span>Tanggung Jawab & Job Desk</h3>
          {!!$responsibilities!!}
        </div>
        @endif

        @if($vacancy->experience != null)
        <div class="mb-5">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-book mr-3"></span>Pendidikan & Pengalaman</h3>
          {!!$experience!!}
        </div>
        @endif

        @if($vacancy->benefits != null)
        <div class="mb-5">
          <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span class="icon-turned_in mr-3"></span>Keuntungan Lainnya</h3>
          {!!$benefits!!}
        </div>
        @endif

        <div class="row mb-5">
          <div class="col-6">
            <a href="{{ url()->previous() }}" class="btn btn-block btn-light btn-md"><span class="fa fa-mail-reply"></span> Kembali</a>
          </div>
          <div class="col-6">
            @php
            $applied = false;
            @endphp
            @foreach($vacancy->applications as $application)
            @if($application->applicant_id == Auth()->user()->id)
            @php
            $applied = true;
            @endphp
            <a href="" class="btn btn-block btn-primary btn-md"><i class="fa fa-check-circle"></i>&nbsp;Sudah Didaftar</a>
            @break
            @endif
            @endforeach
            @unless($applied)
            @if($vacancy->job_status == "open")
            <form action="{{route('u.apply')}}" method="POST">
              @csrf
              <input type="hidden" name="applicant_id" value="{{Auth()->user()->id}}">
              <input type="hidden" name="company_id" value="{{$vacancy->owner->id}}">
              <input type="hidden" name="job_id" value="{{$vacancy->id}}">
              <button class="btn btn-block btn-primary-cs btn-md" type="submit" onclick="return confirm('Apakah Anda yakin melamar pekerjaan ini?')"><i class="fa fa-paper-plane"></i> Daftar Sekarang</button>
            </form>
            @else
            <button class="btn btn-block btn-danger-cs btn-md" type="submit"><i class="fa fa-ban" disabled></i> &nbsp;Sudah Tutup</button>
            @endif
            @endunless
          </div>
        </div>

      </div>
      <div class="col-lg-4">
        <div class="bg-light p-3 border rounded mb-4">
          <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Ringkasan Lowongan</h3>
          <ul class="list-unstyled pl-3 mb-0">
            <li class="mb-2"><strong class="text-black">Dipublikasikan pada : <br></strong>
              {{ \Carbon\Carbon::parse($vacancy->created_at)->locale('id')->formatLocalized('%d %B %Y') }}
            </li>
            <li class="mb-2"><strong class="text-black">Jumlah Karyawan Dibutuhkan :</strong> <br>
              {{$vacancy->vacancy}} Orang
            </li>
            <li class="mb-2"><strong class="text-black">Employment Status :</strong> <br>
              {{$vacancy -> job_type}}
            </li>
            <li class="mb-2"><strong class="text-black">Status Lowongan : </strong> <br>
              @if($vacancy->job_status=="open") {{'Buka'}}
              @else {{'Sudah Tutup'}}
              @endif
            </li>
            <li class="mb-2"><strong class="text-black">Lokasi Pekerjaan :</strong><br> {{$vacancy->location}}</li>
            <li class="mb-2"><strong class="text-black">Tawaran Gaji :</strong> <br>{{$vacancy->salary}}</li>
            <li class="mb-2"><strong class="text-black">Gender :</strong> <br>{{$vacancy->gender}}</li>
            <li class="mb-2"><strong class="text-black">Deadline Pendaftaran :</strong> <br>
              {{ \Carbon\Carbon::parse($vacancy->deadline)->locale('id')->formatLocalized('%d %B %Y') }}
            </li>
          </ul>
        </div>

        <div class="bg-light p-3 border rounded">
          <h3 class="text-primary  mt-3 h5 pl-3 mb-3">Bagikan</h3>
          <div class="px-3">
            <a href="https://facebook.com" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
            <a href="https://twitter.com" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
            <a href="https://linkedin.com" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
            <a href="https://pinterest.com" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-pinterest"></span></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection
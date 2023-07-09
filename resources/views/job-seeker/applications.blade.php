@extends('job-seeker.layouts.template')
    
@section('content')
  @include('job-seeker.layouts.hero-section-2')  
  <section class="site-section">
    <div class="container">
      <!-- MAIN CONTENT -->
      <h2 class="section-title mb-2 text-center">Daftar Lamaran Saya</h2>
      @if(session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong>  {{session('status')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      @if($applications->count() == 0) 
        <h3 class="text-center">
            <span class="badge badge-danger">
                Belum ada lamaran pekerjaan.
            </span>
        </h3>
        <br>
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <a href="{{url('/user/lowongan')}}" class="btn btn-primary-cs border-width-2 d-none d-lg-inline-block"><i class="fa fa-search"></i> Cari Pekerjaan </a>
          </div>
        </div>
      @else
        <table class="table table-striped table-bordered">
            <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Pekerjaan</th>
                <th scope="col-2">Ringkasan Pekerjaan</th>
                <th scope="col">Status Lamaran</th>
                <th colspan="3" class="text-center" scope="col-3">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($applications as $application)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$application->job->job_title }} </td>
                <td>
                    <strong>Mitra:</strong>  {{$application->job->owner->name }} <br>
                    <strong>Lokasi:</strong>  {{$application->job->location }} <br>
                    <strong> Deadline Pendaftaran :</strong> {{ \Carbon\Carbon::parse($application->job->deadline)->locale('id')->formatLocalized('%d %B %Y') }} <br>
                    <strong>Employment Status :</strong>  {{$application->job->job_type}} <br>
                    <strong>Gaji Ditawarkan : </strong> {{$application->job->salary}} <br>
                </td>
                <td>
                  @if($application->application_status == "accepted")
                  <span class="badge badge-success">Diterima</span>
                  @elseif($application->application_status == "rejected")
                  <span class="badge badge-danger">Ditolak</span>
                  @else
                  <span class="badge badge-warning">Diproses</span>
                  @endif
                </td>
                @if($application->application_status != "accepted" && $application->application_status != "rejected")
                <td class="text-start">
                <form action="{{ route('u.delete-application', ['id' => $application->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="application_id" value="{{$application->id}}">
                    <button class="btn btn-danger-cs" type="submit" onclick="return confirm('Yakin ingin membatalkan lamaran? Lamaranmu Masih Diproses oleh pihak mitra!')"><i class="fa fa-times-circle"></i> Batalkan Lamaran</button>
                </form>
                </td>
                <td class="text-start">
                <a href="{{route('u.vacancy', ['id' => $application->job->id ])}}" class="btn btn-success text-black"><i class="fa fa-external-link"></i>&nbsp;Lihat Detail</a>
                </td>
                @else 
                <td colspan=2 class="text-start">
                <a href="{{route('u.vacancy', ['id' => $application->job->id ])}}" class="btn btn-success text-black"><i class="fa fa-external-link"></i>&nbsp;Lihat Detail</a>
                </td>
                @endif
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
        </table>
      @endif

      <div class="row pagination-wrap">
          <div class="col-md-12 text-center text-md-right">
            <div class="custom-pagination ml-auto">
              @if ($applications->onFirstPage())
                <a class="prev disabled">Prev</a>
              @else
                <a href="{{ $applications->previousPageUrl() }}" class="prev">Prev</a>
              @endif
                
              <div class="d-inline-block">
                @foreach ($applications->getUrlRange(1, $applications->lastPage()) as $page => $url)
                  <a href="{{ $url }}" class="{{ $page == $applications->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
              </div>
                
              @if ($applications->hasMorePages())
                <a href="{{ $applications->nextPageUrl() }}" class="next">Next</a>
              @else
                <a class="next disabled">Next</a>
              @endif
            </div>
          </div>
        </div>
  </section>
@endsection
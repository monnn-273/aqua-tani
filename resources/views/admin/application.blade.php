@extends('admin.layout.template')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Manajemen Lamaran Kerja</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="{{route('a.dashboard')}}">Beranda</a></li>
          <li class="active">Kelola Lamaran</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">

    <div class="row">

      <div class="col-lg-4">
        <!-- PROFILE PELAMAR -->
        <div class="card">
          <div class="card-header">
            <strong class="card-title mb-3">Profile Pelamar</strong>
          </div>
          <div class="card-body">
            <div class="mx-auto d-block">
              <img class="rounded-circle mx-auto d-block" src="{{asset('/user/images/' . $application->applicant->pfp)}}" alt="Card image cap" style="height:200px;width:200px;">
              <h5 class="text-sm-center mt-2 mb-1">{{$application->applicant->name}}</h5>
              <div class="text-sm-center"><i class="fa fa-envelope"></i> {{$application->applicant->email}}</div>
              <div class="text-sm-center"><i class="fa fa-map-marker"></i> {{$application->applicant->address}}</div>
              <div class="text-sm-center"><i class="fa fa-phone"></i> {{$application->applicant->phone_number}}</div>
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

        <!-- STATUS LAMARAN  -->
        <div class="card mt-3">
          <div class="card-header">
            <strong>Status Lamaran</strong>
            @if($application->application_status == 'accepted')
            <span class="badge badge-success badge md">Diterima</span>
            @elseif($application->application_status == 'rejected')
            <span class="badge badge-danger badge md">Ditolak</span>
            @else
            <span class="badge badge-warning badge md">Sedang Diproses</span>
            @endif
          </div>
          <div class="card-body">
            <label for="select" class="form-control-label">Ubah Status Lamaran</label>
            <div class="row">

              @if($application->application_status == 'accepted')
              <div class="col-3">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="rejected">
                  <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menolak lamaran ini? ')"><i class=" fa fa-times-circle"></i>&nbsp;Tolak</button>
                </form>
              </div>
              <div class="col-3">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="processed">
                  <button class="btn btn-sm btn-warning" onclick="return confirm('Yakin ingin menandai lamaran ini sebagai sedang diproses? ')"><i class="fa fa-spinner"></i>Sedang diproses</button>
                </form>
              </div>
              @elseif($application->application_status == 'rejected')
              <div class="col-4">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="accepted">
                  <button class="btn btn-sm btn-success" type="submit" onclick="return confirm('Yakin ingin menerima lamaran ini? ')"><i class="fa fa-check-circle"></i>&nbsp;Terima</button>
                </form>
              </div>
              <div class="col-3">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="processed">
                  <button class="btn btn-sm btn-warning" type="submit" onclick="return confirm('Yakin ingin menandai lamaran ini sebagai sedang diproses? ')"><i class="fa fa-spinner"></i>&nbsp;Sedang Diproses</button>
                </form>
              </div>
              @else
              <div class="col-3">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="accepted">
                  <button class="btn btn-sm btn-success" type="submit" onclick="return confirm('Yakin ingin menerima lamaran ini? ')"><i class="fa fa-check-circle"></i>&nbsp;Terima</button>
                </form>
              </div>
              <div class="col-3">
                <form action="{{route('a.update-application', ['id' => $application->id])}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="status" value="rejected">
                  <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menolak lamaran ini? ')"><i class="fa fa-times-circle"></i>&nbsp;Tolak</button>
                </form>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- INFORMASI LOWONGAN -->
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <strong class="card-title mb-3">Informasi Lowongan yang Dilamar</strong>
          </div>
          <div class="card-body">
            <div class="mx-auto d-block">
              <center>
                <img class="img-fluid" src="{{asset('/user/images/job/' . $application->job->image)}}" style="height:200px;width:360px;">
              </center>
              <h5 class="text-sm-center mt-2 mb-1">{{$application->job->job_title}}</h5>
            </div>
            <hr>
            <div class="card-text text-sm-start">
              <strong>Mitra:</strong> {{$application->job->owner->name}}<br>
              <strong>Lokasi Lowongan:</strong> {{$application->job->location}}<br>
            </div>
            <div class="card-text text-sm-start">
              <br>
              <strong>Deskripsi Lowongan:</strong><br>
              {!! $application->job->job_description !!}<br>

              <br>
              @if($application->job->responsibilities != null)
              <strong>Tanggung Jawab / Job Desk:</strong><br>
              {!! $application->job->responsibilities !!}<br>
              @endif

              <br>
              @if($application->job->experience != null)
              <strong>Pengalaman + Pendidikan:</strong><br>
              {!! $application->job->experience !!}<br>
              @endif

              <br>
              @if($application->job->benefits != null)
              <strong>Keuntungan Lainnya:</strong><br>
              {!! $application->job->benefits!!}<br>
              @endif

              <br>
              <strong>Gaji Ditawarkan:</strong><br>
              {{$application->job->salary}}<br><br>

              <strong>Jumlah Lowongan:</strong><br>
              {{$application->job->vacancy}}<br><br>

              <strong>Kategori Pekerjaan:</strong><br>
              {{$application->job->job_category}}<br><br>

              <strong>Deadline:</strong><br>
              {{ \Carbon\Carbon::parse($application->job->deadline)->locale('id')->formatLocalized('%d %B %Y') }}<br><br>

              <strong>Kategori Pekerjaan:</strong><br>
              {{$application->job->job_category}}<br><br>

              <strong>Status Lowongan:</strong><br>
              @if($application->job->job_status == 'open')
              <div class="badge badge-success btn-lg">Buka</div>
              @elseif($application->job->job_status == 'closed')
              <div class="badge badge-danger btn-lg">Tutup</div>
              @endif
              <br>
            </div>
          </div>
          <div class="card-footer justify-content-end">
            <a href="{{url()->previous()}}" class="btn btn-lg btn-light"><i class="fa fa-mail-reply"></i>Kembali</a>
          </div>
        </div>
      </div>
    </div>

  </div><!-- .animated -->
</div><!-- .content -->
@endsection
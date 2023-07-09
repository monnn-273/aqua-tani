@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section-2')
<section class="site-section">
  <div class="container">
    <!-- MAIN CONTENT -->
    <h2 class="section-title mb-2 text-center">Kelola Lowongan</h2>
    @if($vacancies->count() == 0)
    <h3 class="text-center">Belum ada lowongan yang diposting.</h3>
    <br>
    <div class="row mb-5 justify-content-center">
      <div class="col-md-8 text-center">
        <a href="{{__('/recruiter/pekerjaan')}}" class="btn btn-primary-cs border-width-2 d-none d-lg-inline-block text-black"><i class="fa fa-plus"></i> Posting Tawaran Pekerjaan </a>
      </div>
    </div>
    @else

    <div class="row mb-5 justify-content-center">
      <div class="col-md-8 text-center">
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Berhasil!</strong> {{session('status')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <a href="{{__('/recruiter/pekerjaan')}}" class="btn btn-primary-cs border-width-2 d-none d-lg-inline-block text-black"><i class="fa fa-plus"></i> Posting Tawaran Pekerjaan </a>
      </div>
    </div>
    <table class="table table-bordered border-success table-striped">
      <thead class="text-center">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul Pekerjaan</th>
          <th scope="col-2">Ringkasan Pekerjaan</th>
          <th scope="col-2">Jumlah Pelamar</th>
          <th colspan="3" class="text-center" scope="col-3">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @php $i = 1; @endphp
        @foreach($vacancies as $vacancy)
        <tr>
          <th scope="row">{{$i}}</th>
          <td>{{ $vacancy->job_title }} </td>
          <td>
            <strong>Lokasi:</strong> {{ $vacancy->location }} <br>
            <strong>Deadline Pendaftaran :</strong> {{ \Carbon\Carbon::parse($vacancy->deadline)->locale('id')->formatLocalized('%d %B %Y') }} <br>
            <strong>Employment Status :</strong> {{ $vacancy->job_type}} <br>
            <strong>Gaji Ditawarkan : </strong> {{$vacancy->salary}} <br>
          </td>
          <td>{{ $vacancy->applications->count()}} Pelamar </td>
          <td class="text-center">
            <a href="{{route('r.edit_job',['id' => $vacancy->id ]) }}" class="btn btn-warning text-black"><i class="fa fa-pencil"></i>&nbsp;Edit</a>
          </td>
          <td class="text-center">
            <form action="{{ route ('r.delete_job', ['id' => $vacancy->id ]) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger-cs" type="submit" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i>&nbsp;Hapus</button>
            </form>
          </td>
          <td class="text-center">
            <a href="{{ route ('r.vacancy', ['id' => $vacancy->id ]) }}" class="btn btn-success text-black"><i class="fa fa-external-link"></i>&nbsp;Pratinjau</a>
          </td>
        </tr>
        @php $i++; @endphp
        @endforeach
      </tbody>
    </table>
    @endif
</section>
@endsection
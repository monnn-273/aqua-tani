@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section-2')
<section class="site-section">
  <div class="container">

    <!-- MAIN CONTENT -->
    <h2 class="section-title mb-2 text-center">Kelola Lamaran</h2>
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Berhasil!</strong> {{session('status')}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($applications->count() == 0)
    <h3 class="text-center">Belum ada lamaran.</h3>
    @else
    <table class="table table-bordered border-success table-striped">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul Pekerjaan</th>
          <th scope="col">Ringkasan Pelamar</th> <!-- include the applicant skills, address, and name -->
          <th scope="col">Status Lamaran</th>
          <th scope="col-3" colspan="3" class="text-center">Tindakan</th>
        </tr>
      </thead>
      <tbody>
        @php $i = 1; @endphp
        @foreach($applications as $application)
        <tr>
          <th scope="row">{{$i}}</th>
          <td>{{$application->job->job_title}}</td>
          <td>
            <strong>Nama Pelamar:</strong> {{$application->applicant->name}} <br>
            <strong>No. HP : </strong> {{$application->applicant->phone_number}} <br>
            <strong> Alamat : </strong>{{$application->applicant->address}} <br>
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
          <td class="text-start">
            <form action="{{route('r.update-application', ['id' => $application->id ])}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="application_status" value="rejected">
              <input type="hidden" name="receiver_id" value="{{$application->applicant->id}}">
              <button type="submit" class="btn btn-block btn-danger-cs btn-md" onclick="return confirm('Yakin ingin menolak lamaran ini?')"><i class="fa fa-times-circle"></i> Tolak</button>
            </form>
          </td>
          <td class="text-start">
            <form action="{{route('r.update-application', ['id' => $application->id ])}}" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="application_status" value="accepted">
              <input type="hidden" name="receiver_id" value="{{$application->applicant->id}}">
              <button type="submit" class="btn btn-block btn-primary-cs btn-md" onclick="return confirm('Yakin ingin menerima lamaran ini?')"><i class="fa fa-check-circle"></i> Terima</button>
            </form>
          </td>
          <td class="text-start">
            <a href="{{route('r.application-detail', ['id' => $application->id ])}}" class="btn btn-secondary"><i class="fa fa-edit"></i>&nbsp;Kelola</a>
          </td>
        </tr>
        @php $i++; @endphp
        @endforeach
      </tbody>
    </table>
    @endif
</section>
@endsection
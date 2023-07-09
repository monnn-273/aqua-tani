@extends('admin.layout.template')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Profile Administrator</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="{{route('a.dashboard')}}">Beranda</a></li>
          <li class="active">Profile Saya</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">
    <br>
    <div class="row">
      @if(session('status'))
      <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          <span class="badge badge-pill badge-success">Success</span> {{session('status')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endif
      <!-- FORMULIR UPDATE PROFILE -->
      <div class="col-lg-8 col-md-6">
        <div class="card">
          <div class="card-header">
            <strong>Profile Administrator</strong>
          </div>
          <form action="{{route('a.update-profile', ['id'=> Auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body card-block">
              <!-- pfp -->
              <div class="form-group">
                <label for="pfp" class="form-control-label">Ubah Foto Profile</label> <br>
                <input type="file" id="pfp" class="form-control @error('pfp') is-invalid @enderror" name="pfp">
                @error('pfp')
                <div class="text-danger">{{$message}}</div>
                @enderror
              </div>

              <!-- nama -->
              <div class="form-group">
                <label class=" form-control-label" for="name">Nama</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-bold"></i></div>
                  <input class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name',Auth()->user()->name)}}">
                  @error('job_title')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <!-- email -->
              <div class="form-group">
                <label for="email" class="control-label mb-1">Email</label>
                <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('email', Auth()->user()->email)}}">
                @error('email')
                <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <!-- phone number -->
              <div class="form-group">
                <label for="phone_number" class="control-label mb-1">Nomor Telepon / WA</label>
                <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number',  Auth()->user()->phone_number)}}">
                @error('phone_number')
                <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <!-- alamat -->
              <div class="form-group">
                <label for="address" class="control-label mb-1">Alamat</label>
                <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('address',  Auth()->user()->address)}}">
                @error('address')
                <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>
              <br><br>
              <div class="row">
                <div class="col-6">
                  <a href="{{url()->previous()}}" class="btn rounded btn-light btn-lg btn-secondary btn-block"><i class="fa fa-mail-reply fa-lg"></i>&nbsp;
                    Kembali
                  </a>
                </div>
                <div class="col-6">
                  <button type="submit" class="btn btn-lg rounded btn-primary btn-block"><i class="fa fa-save fa-lg"></i>&nbsp;
                    Simpan Perubahan
                  </button>
                </div>
              </div>
            </div>
          </form>
          <br><br>
        </div>
      </div>

      <!-- PROFILE MITRA -->
      <div class="col-lg-4 col-md-6">
        <div class="card">
          <div class="card-header">
            <strong class="card-title mb-3">Profile Saat Ini</strong>
          </div>
          <div class="card-body">
            <div class="mx-auto d-block">
              <img class="rounded-circle mx-auto d-block" src="{{ asset('/user/images/' . Auth()->user()->pfp) }}" alt="Card image cap">
              <h5 class="text-sm-center mt-2 mb-1">{{Auth()->user()->name}}</h5>
              <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{Auth()->user()->address}}</div>
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
    </div>

    <br><br><br>
  </div>
</div><!-- .content -->
@endsection
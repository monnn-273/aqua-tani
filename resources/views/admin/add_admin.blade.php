@extends('admin.layout.template')
@section('content')
<div class="breadcrumbs">
  <div class="col-sm-4">
    <div class="page-header float-left">
      <div class="page-title">
        <h1>Manajemen Pengguna</h1>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="page-header float-right">
      <div class="page-title">
        <ol class="breadcrumb text-right">
          <li><a href="{{route('a.dashboard')}}">Beranda</a></li>
          <li class="active">Kelola Admin</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">

    <div class="row justify-content-start">
      <a href="{{url()->previous()}}" class="btn btn-light btn-md"><i class="fa fa-mail-reply"></i>&nbsp;Kembali</a> &nbsp;&nbsp;
    </div>
    <br>
    <div class="row">
      <!-- INFORMASI LENGKAP -->
      <div class="col-lg-8 col-md-6">
        <div class="card">
          <div class="card-header">
            <strong>Tambahkan administrator baru</strong>
          </div>
          <form action="{{route('a.store_new_admin')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body card-block">

              <!-- pfp -->
              <div class="form-group">
                <label for="pfp" class="form-control-label">Tambahkan Foto Profile</label> <br>
                <input type="file" id="pfp" class="form-control @error('pfp') is-invalid @enderror" name="pfp">
                <!-- Add an empty image tag to display the preview -->
                <img id="preview-image" src="#" class="hidden" alt="Preview Image" style="height:100px;width:100px;" />
                @error('pfp')
                <div class="text-danger">{{$message}}</div>
                @enderror
              </div>

              <!-- name -->
              <div class=" form-group">
                <label class=" form-control-label" for="name">Nama</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                  <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                  @error('name')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <!-- email -->
              <div class=" form-group">
                <label class=" form-control-label" for="email">Email</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                  <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                  @error('email')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <!-- password -->
              <div class=" form-group">
                <label class=" form-control-label" for="password">Password</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                  <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" value="{{old('password')}}">
                </div>
                <div class="input-group">
                  @error('password')
                  <div class="text-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <!-- konfirmasi password -->
              <div class="form-group">
                <label class="form-control-label" for="password_confirmation">Konfirmasi Password</label>
                <div class="input-group">
                  <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                  <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                  @error('password_confirmation')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>


              <!-- tombol submit -->
              <div class="text-md-center justify-content">
                <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-save"></i> &nbsp;Simpan Perubahan</button>
              </div>
            </div>
          </form>
          <br><br><br>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
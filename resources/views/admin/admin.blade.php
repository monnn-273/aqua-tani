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
          <li><a href="{{route('a.dashboard')}}}">Dashboard</a></li>
          <li class="active"><a href="{{route('a.dashboard')}}}">Kelola Admin</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="content mt-3">
  <div class="animated fadeIn">

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Informasi Administrator</strong>
          </div>
          <div class="card-body">
            <div id="pay-invoice">
              <div class="card-body">
                <hr>
                <form action="{{route('a.update-admin', ['id'=> $admin->id])}}" method="POST">
                  @csrf
                  @method("PUT")

                  <!-- preview foto profile -->
                  <div class="form-group text-center">
                    <img src="{{ asset('/admin/images/' . $admin->pfp) }}" alt="Profile Picture" style="width:200px; height:200px;">
                  </div>

                  <!-- name -->
                  <div class="form-group">
                    <label for="name" class="control-label mb-1">Nama Administrator</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('name',$admin->name)}}">
                    @error('name')
                    <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>

                  <!-- email -->
                  <div class="form-group">
                    <label for="email" class="control-label mb-1">Email</label>
                    <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('email', $admin->email)}}">
                    @error('email')
                    <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>

                  <!-- phone number -->
                  <div class="form-group">
                    <label for="phone_number" class="control-label mb-1">Nomor Telepon / WA</label>
                    <input id="phone_number" name="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('phone_number', $admin->phone_number)}}">
                    @error('phone_number')
                    <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>

                  <!-- alamat -->
                  <div class="form-group">
                    <label for="address" class="control-label mb-1">Alamat</label>
                    <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('address', $admin->address)}}">
                    @error('address')
                    <div class="text-danger text-sm">{{$message}}</div>
                    @enderror
                  </div>

                  <!-- pilih role -->
                  <div class="row form-group">
                    <div class="col col-md-3"><label for="role" class=" form-control-label">Pilih Role</label></div>
                    <div class="col-12 col-md-9">
                      <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="1" @if($admin->role === 1) selected @endif>Administrator</option>
                        <option value="2" @if($admin->role === 2) selected @endif>Mitra</option>
                        <option value="3" @if($admin->role === 3) selected @endif>Pengguna (Pelamar)</option>
                      </select>
                      @error('role')
                      <div class="text-danger text-sm">{{$message}}</div>
                      @enderror
                    </div>
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
                  <br><br>
                </form>
              </div>
            </div>
          </div>
        </div> <!-- .card -->
      </div>
      <!--/.col-->

    </div><!-- .animated -->
  </div><!-- .content -->
  @endsection
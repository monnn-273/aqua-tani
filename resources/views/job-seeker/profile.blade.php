@extends('job-seeker.layouts.template')
    
@section('content')
    @include('job-seeker.layouts.hero-section-2')
    <section class="site-section services-section bg-light block__62849" id="next-section">
      <div class="container">
        
        <div class="row justify-content-center">
          <div class="col-8 col-md-8 col-lg-8 mb-4 mb-lg-5">
            @if(session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong>  {{session('status')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <form method="POST" action="{{route('u.update-profile')}}" enctype="multipart/form-data" class="p-4 p-md-5 border rounded bg-white">
              <center><h3 class="section-title">Profile Pengguna</h3></center>
              <br>
              @csrf
              @method('patch')
              <center><img src="/user/images/{{Auth()->user()->pfp}}" alt="" style="height:200px; width:200px"></center>
              <br><br>
            
              <!-- user pfp -->
              <div class="form-group">
                <div class="mb-3">
                  <label for="formFile" class="form-label">Ubah Foto Profile</label>
                  <input class="form-control @error('pfp') is-invalid @enderror" type="file" name="pfp" onchange="previewImage(event)" value="{{old('pfp', Auth()->user()->pfp)}}">
                  <div class="image-preview hidden">
                    <img id="preview-image" src="#" alt="Preview Image" />
                  </div>
                  @error('pfp')
                    <div class="text-danger text-sm">{{$message}}</div>
                  @enderror
                </div>
              </div>

              <!-- name -->
              <div class="form-group">
              <label for="name">Nama Pengguna</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{old('name', Auth()->user()->name)}}">
              @error('name')
                <div class="text-danger text-sm">{{$message}}</div>
              @enderror
              </div>

              <!-- address -->
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" required value="{{old('address', Auth()->user()->address)}}">
                @error('address')
                  <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <!-- phone number -->
              <div class="form-group">
                <label for="phone_number">Nomor HP (Terhubung dengan Whatsapp)</label>
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{old('phone_number', Auth()->user()->phone_number)}}">
                @error('phone_number')
                  <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <div class="row align-items-end mb-5">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary-cs btn-md"><i class="fa fa-save"></i> &nbsp; Simpan Perubahan</button>
                </div>
              </div>
            </form>     
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-8 col-md-8 col-lg-8 mb-4 mb-lg-5">
          <center><h3 class="section-title">Daftar Keahlian</h3></center>
          <div class="p-4 p-md-5 border rounded bg-white">
          <h4>Daftar keahlian saat ini:</h4> <br>
            <ul class="list-unstyled m-0 p-0">
              @foreach($userSkills as $userSkill)
                <li class="d-flex align-items-start mb-2">
                  <span class="icon-check_circle mr-2 text-muted"></span><span>{{$userSkill->skill->skill_name}}</span> &nbsp;
                  <form action="{{ route('u.delete-skill', ['id' => $userSkill->skill->id]) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus keahlian ini? Keahlian menjadi bahan pertimbangan lamaran Anda!')"><i class="fa fa-times-circle text-danger"></i></button>
                  </form>
                </li>
              @endforeach
            </ul>
          </div>

            <form method="POST" action="{{route('u.create-skill')}}" enctype="multipart/form-data" class="p-4 p-md-5 border rounded bg-white">
              <h5>Pilih dari skill yang sudah terdaftar</h5>
              <br>
              @csrf

              <!-- skill id -->
              <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <select class="selectpicker border rounded @error('skill_id') is-invalid @enderror" id="skill_id" name="skill_id" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih keahlian" required>
                  @foreach($skills as $skill)
                  <option value="{{$skill->id}}">{{$skill->skill_name}}</option>
                  @endforeach
                </select>
                @error('skill_id')
                  <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <div class="row align-items-end mb-5">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary-cs btn-md"><i class="fa fa-save"></i> &nbsp; Simpan Perubahan</button>
                </div>
              </div>
            </form>
            
            <form method="POST" action="{{route('u.create-skill-2')}}" enctype="multipart/form-data" class="p-4 p-md-5 rounded bg-white">
              <h5>Atau definisikan skill baru yang tidak ada dalam pilihan</h5>
              <br>
              @csrf

              <!-- skill name -->
              <div class="form-group">
                <label for="name">Keahlian</label>
                <input type="text" class="form-control @error('skill_name') is-invalid @enderror" id="skill_name" name="skill_name" required value="{{old('skill_name')}}">
                @error('skill_name')
                  <div class="text-danger text-sm">{{$message}}</div>
                @enderror
              </div>

              <div class="row align-items-end mb-5">
                <div class="col-12">
                  <button type="submit" class="btn btn-block btn-primary-cs btn-md"><i class="fa fa-save"></i> &nbsp; Simpan Perubahan</button>
                </div>
              </div>
            </form>     
          </div>
        </div>

        
      </div>
    </section>
@endsection
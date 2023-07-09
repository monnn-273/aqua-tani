@extends('main-layout.template')
@section('content')
@include('guest.layouts.hero-section-2')
<section class="site-section" id="next-section">
  <div class="container">
    <div class="row mb-5 justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="section-title mb-2">Masuk ke Aqua Tani</h2>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- INPUT EMAIL -->
          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="email">Email</label>
              <input type="email" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email" class="form-control @error('email') is-invalid @enderror">
              @error('email')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label class="text-black" for="password">Password</label>
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" value="{{old('password')}}">
              @error('password')
              <div class="text-danger">{{$message}}</div>
              @enderror
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              @if (Route::has('password.request'))
              <p class="mb-0"><a href="{{ route('password.request') }}">
                  {{ __('Lupa kata sandi?') }}
                </a></p>
              @endif
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <center>
                <button type="submit" class="btn btn-primary-cs btn-md text-white">Masuk</button>
              </center>
            </div>
          </div>
        </form>
        <div class="row form-group">
          <div class="col-md-12">
            <p class="mb-0 text-center">Belum punya akun? <a class="text-primary" href="{{ route('register') }}"> Daftar</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
@endsection
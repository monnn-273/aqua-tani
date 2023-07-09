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
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="role" value=2>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="name">Nama Mitra / Perusahaan</label>
                            <input type="name" id="name" name="name" value="{{old('name')}}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email Mitra / Perusahaan</label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" required autofocus autocomplete="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" id="password" name="password" value="{{old('password')}}" required autocomplete="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" value="{{old('password_confirmation')}}" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <center>
                                <button type="submit" class="btn btn-primary-cs btn-md text-white">Daftar</button>
                            </center>
                        </div>
                    </div>
                </form>
                <div class="row form-group">
                    <div class="col-md-12">
                        <p class="mb-0 text-center">Sudah punya akun? <a class="text-primary" href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
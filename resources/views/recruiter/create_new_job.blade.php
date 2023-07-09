@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section-2')
<section class="site-section">
	<div class="container">

		<div class="row mb-5 justify-content-center">
			<div class="col-md-7 text-center">
				<h2 class="section-title mb-2">Buat Lowongan Baru</h2><br>
			</div>
		</div>

		<div class="row mb-5">
			<div class="col-lg-12">
				<form method="POST" action="{{route('r.create_new_job')}}" enctype="multipart/form-data" class="p-4 p-md-5 border rounded">
					@csrf
					<input type="hidden" name="job_owner_id" value="{{ auth()->user()->id }}">
					<h2 class="section-title mb-2">Detail Pekerjaan</h2>

					<!-- image -->
					<div class="form-group">
						<div class="mb-3">
							<label for="formFile" class="form-label">Upload Gambar Ilustrasi</label>
							<input class="form-control @error('image') is-invalid @enderror" type="file" name="image" onchange="previewImage(event)" value="{{old('image')}}">
							<div class="image-preview hidden">
								<img id="preview-image" src="#" alt="Preview Image" />
							</div>
							@error('image')
							<div class="text-danger text-sm">{{$message}}</div>
							@enderror
						</div>
					</div>

					<!-- job-title -->
					<div class="form-group">
						<label for="job_title">Judul Pekerjaan</label>
						<input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" placeholder="Contoh: Jasa Panen Padi" required autofocus value="{{old('job_title')}}">
						@error('job_title')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- location -->
					<div class="form-group">
						<label for="location">Lokasi</label>
						<input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required value="{{old('location')}}">
						@error('location')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job-type : full-time / part-time -->
					<div class="form-group">
						<label for="job_type">Tipe Pekerjaan</label>
						<select class="selectpicker border rounded @error('job_type') is-invalid @enderror" id="job_type" name="job_type" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih tipe pekerjaan" required>
							<option value="part-time" @if(old('job_type')==='part-time' ) selected @endif>Part Time</option>
							<option value="full-time" @if(old('job_type')==='full-time' ) selected @endif>Full Time</option>
						</select>
						@error('job_type')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job description -->
					<div class="form-group">
						<label for="job_description">Deskripsi Pekerjaan</label>
						<textarea name="job_description" class="@error('job_description') is-invalid @enderror" id="desc" cols="30" rows="10" required>
						{{old('job_description')}}
						</textarea>
						@error('job_description')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- responsibilities -->
					<div class="form-group">
						<label for="responsibilities">Tanggung Jawab / Job Desk (Opsional) </label>
						<textarea name="responsibilities" class="@error('responsibilities') is-invalid @enderror" id="resp" cols="30" rows="5">
						{{old('responsibilities')}}
						</textarea>
						@error('responsibilities')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- experiences -->
					<div class="form-group">
						<label for="experience">Pengalaman Kerja / Pendidikan (Opsional) </label>
						<textarea name="experience" class="@error('experience') is-invalid @enderror" id="exp" cols="30" rows="5">
						{{old('experience')}}
						</textarea>
						@error('experience')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- benefits -->
					<div class="form-group">
						<label for="benefits">Keuntungan Lainnya (Opsional) </label>
						<textarea name="benefits" class="@error('benefits') is-invalid @enderror" id="ben" cols="30" rows="5">
						{{old('benefits')}}
						</textarea>
						@error('benefits')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- vacancy -->
					<div class="form-group">
						<label for="vacancy">Jumlah Lowongan yang Disediakan</label>
						<input type="number" class="form-control @error('vacancy') is-invalid @enderror" id="vacancy" name="vacancy" placeholder="e.g 20" min="1" required value="{{old('vacancy')}}">
						@error('vacancy')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job-category : pertanian/perikanan -->
					<div class="form-group">
						<label for="job_category">Kategori Pekerjaan</label>
						<select class="selectpicker border rounded  @error('job_category') is-invalid @enderror" id="job_category" name="job_category" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Kategori Pekerjaan" required value="{{old('job_category')}}">
							<option value="pertanian" @if(old('job_category')==='pertanian' ) selected @endif>Pertanian</option>
							<option value="perikanan" @if(old('job_category')==='perikanan' ) selected @endif>Perikanan</option>
						</select>
						@error('job_category')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- salary -->
					<div class="form-group">
						<label for="salary">Gaji</label>
						<input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" placeholder="Contoh: Rp1.000.000/bulan" required value="{{old('salary')}}">
						<div class="text-sm fw-light">Gaji dapat dalam bentuk rentang nilai. Contoh: Rp2.000.000 - Rp3.500.000</div>
						@error('salary')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- gender -->
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="selectpicker border rounded  @error('gender') is-invalid @enderror" id="gender" name="gender" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Gender" required value="{{old('gender')}}">
							<option value="laki-laki" @if(old('gender')==='laki-laki' ) selected @endif>Laki-laki</option>
							<option value="perempuan" @if(old('gender')==='perempuan' ) selected @endif>Perempuan</option>
							<option value="tidak ditentukan">Tidak ditentukan</option>
						</select>
						@error('gender')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- application deadline -->
					<div class="form-group">
						<label for="deadline">Deadline Pendaftaran</label>
						<input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" required value="{{old('deadline')}}">
						@error('deadline')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<div class="row align-items-end mb-5">
						<div class="col-lg-4 ml-auto">
							<div class="row">
								<div class="col-12">
									<button type="submit" class="btn btn-block btn-primary-cs btn-md"><i class="fa fa-save"></i> &nbsp; Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@endsection
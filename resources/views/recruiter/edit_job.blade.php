@extends('recruiter.layouts.template')

@section('content')
@include('recruiter.layouts.hero-section-2')
<section class="site-section">
	<div class="container">

		<div class="row mb-5 justify-content-center">
			<div class="col-md-7 text-center">
				<h2 class="section-title mb-2">Edit Lowongan Kerja</h2><br>
			</div>
		</div>

		<div class="row mb-5">
			<div class="col-lg-12">
				<form method="POST" action="{{route('r.update-job',['id' => $job->id ]) }}" enctype="multipart/form-data" class="p-4 p-md-5 border rounded">
					@csrf
					@method('PATCH')
					<input type="hidden" name="id" value="{{$job->id}}">
					<h2 class="section-title mb-2">Detail Pekerjaan</h2>
					<br>

					<img src="{{ asset ('/user/images/job/'. $job->image)}}" alt="Illustration_image" style="width:200px; height:200px">

					<!-- image -->
					<div class="form-group">
						<div class="mb-3">
							<label for="formFile" class="form-label">Ubah Gambar Ilustrasi</label>
							<input class="form-control @error('image') is-invalid @enderror" type="file" name="image" onchange="previewImage(event)">
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
						<input type="text" class="form-control @error('job_title') is-invalid @enderror" id="job_title" name="job_title" placeholder="Contoh: Jasa Panen Padi" required autofocus value="{{$job->job_title}}">
						@error('job_title')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- location -->
					<div class="form-group">
						<label for="location">Lokasi</label>
						<input type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location" required value="{{$job->location}}">
						@error('location')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job-type : full-time / part-time -->
					<div class="form-group">
						<label for="job_type">Tipe Pekerjaan</label>
						<select class="selectpicker border rounded @error('job_type') is-invalid @enderror" id="job_type" name="job_type" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih tipe pekerjaan" required>
							<option value="patt-time" @if(($job->job_type) === 'part-time') selected @endif>Part Time</option>
							<option value="full-time" @if(($job->job_type) === 'full-time') selected @endif>Full Time</option>
						</select>
						@error('job_type')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job description -->
					<div class="form-group">
						<label for="job_description">Deskripsi Pekerjaan</label>
						<textarea name="job_description" class="@error('job_description') is-invalid @enderror" id="desc" cols="30" rows="10" required>
						{{$job->job_description}}
						</textarea>
						@error('job_description')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- responsibilities -->
					<div class="form-group">
						<label for="responsibilities">Tanggung Jawab / Job Desk (Opsional) </label>
						<textarea name="responsibilities" class="@error('responsibilities') is-invalid @enderror" id="resp" cols="30" rows="5">
						{{$job->responsibilities}}
						</textarea>
						@error('responsibilities')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- experiences -->
					<div class="form-group">
						<label for="experience">Pengalaman Kerja / Pendidikan (Opsional) </label>
						<textarea name="experience" class="@error('experience') is-invalid @enderror" id="exp" cols="30" rows="5">
						{{$job->experience}}
						</textarea>
						@error('experience')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- benefits -->
					<div class="form-group">
						<label for="benefits">Keuntungan Lainnya (Opsional) </label>
						<textarea name="benefits" class="@error('benefits') is-invalid @enderror" id="ben" cols="30" rows="5">
						{{$job->benefits}}
						</textarea>
						@error('benefits')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- vacancy -->
					<div class="form-group">
						<label for="vacancy">Jumlah Lowongan yang Disediakan</label>
						<input type="number" class="form-control @error('vacancy') is-invalid @enderror" id="vacancy" name="vacancy" placeholder="e.g 20" min="1" required value="{{$job->vacancy}}">
						@error('vacancy')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job-category : pertanian/perikanan -->
					<div class="form-group">
						<label for="job_category">Kategori Pekerjaan</label>
						<select class="selectpicker border rounded  @error('job_category') is-invalid @enderror" id="job_category" name="job_category" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Kategori Pekerjaan" required value="{{$job->job_category}}">
							<option value="pertanian" @if(($job->job_category) === 'pertanian') selected @endif>Pertanian</option>
							<option value="perikanan" @if(($job->job_category) === 'perikanan') selected @endif>Perikanan</option>
						</select>
						@error('job_category')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- salary -->
					<div class="form-group">
						<label for="salary">Gaji</label>
						<input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" placeholder="Contoh: Rp1.000.000/bulan" required value="{{$job->salary}}">
						<div class="text-sm fw-light">Gaji dapat dalam bentuk rentang nilai. Contoh: Rp2.000.000 - Rp3.500.000</div>
						@error('salary')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- gender -->
					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="selectpicker border rounded  @error('gender') is-invalid @enderror" id="gender" name="gender" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih Gender" required>
							<option value="laki-laki" @if(($job->gender) === 'laki-laki') selected @endif>Laki-laki</option>
							<option value="perempuan" @if(($job->gender) === 'perempuan') selected @endif>Perempuan</option>
							<option value="tidak ditentukan" @if(($job->gender) === 'tidak ditentukan') selected @endif>Tidak Ditentukan</option>
						</select>
						@error('gender')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- application deadline -->
					<div class="form-group">
						<label for="deadline">Deadline Pendaftaran</label>
						<input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" required value="{{$job->deadline}}">
						@error('deadline')
						<div class="text-danger text-sm">{{$message}}</div>
						@enderror
					</div>

					<!-- job_status : open/close -->
					<div class="form-group">
						<label for="job_status">Status Lowongan</label>
						<select class="selectpicker border rounded @error('job_status') is-invalid @enderror" id="job_status" name="job_status" data-style="btn-black" data-width="100%" data-live-search="true" title="Pilih status lowongan" required>
							<option value="open" @if($job->job_status === 'open') selected @endif>Dibuka</option>
							<option value="closed" @if($job->job_status === 'closed') selected @endif>Tutup</option>
						</select>
						@error('job_status')
						<div class="text-danger text-sm">{{ $message }}</div>
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
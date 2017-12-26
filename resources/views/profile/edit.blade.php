@extends('layouts.app')


@section('css')
@endssection

@section('content')
<div class="container" style="padding:61px 20px; background:#ebebeb">
	<div class="row">
	<div class="col-md-6">
		<h1>Edit Profile</h1>
	<form action="{{ url('/editProfile')}}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-row">
			<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
				<label for="user-name">Nama</label>
				<input type="text" class="form-control" id="user-name" name="name" value="{{ $user->name }}">
				@if ($errors->has('name'))
                    <div class="form-control-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
			</div>
			<div class="form-group{{ $errors->has('fullname') ? ' has-danger' : '' }}">
				<label for="biodata-fullname">Nama Lengkap</label>
				<input type="text" class="form-control" id="biodata-fullname" name="fullname" value="{{ $user->biodata->fullname }}">
				@if ($errors->has('fullname'))
                    <div class="form-control-feedback">
                        {{ $errors->first('fullname') }}
                    </div>
                @endif
			</div>
			<div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
				<label for="user-img">Gambar Profil</label>
				<div style="width:50%;">
					<label for="user-img"><img src="{{ $user->imageProfile() }}" width="100%" id="preview"></label>
					<input type="file" class="form-control" id="user-img" name="image">
					@if ($errors->has('image'))
	                    <div class="form-control-feedback">
	                        {{ $errors->first('image') }}
	                    </div>
	                @endif
				</div>
			</div>
			<div class="form-group">
				<label>NIM</label>
				@if ($user->biodata->nim)
					<input type="text" class="form-control disabled" value="{{ $user->biodata->nim }}" disabled>
				@else
					<input type="text" class="form-control" value="{{ $user->biodata->nim }}" name="nim">
				@endif
			</div>
			<div class="form-group{{ $errors->has('jurusan') ? ' has-danger' : '' }}">
				<label>Jurusan</label>
				<select class="form-control" name="jurusan">
					@foreach ($jurusans as $jurusan)
						<option value="{{ $jurusan->id }}" {{ $jurusan->id == $user->biodata->jurusan->id ? 'selected' : ''}}>{{ $jurusan->nama }}</option>
					@endforeach
				</select>
				@if ($errors->has('jurusan'))
                    <div class="form-control-feedback">
                        {{ $errors->first('jurusan') }}
                    </div>
                @endif
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Edit</button>
			</div>
		</div>
	</form>
	</div>
	<hr>
	<div class="col-md-5 col-md-offset-1">
		<!-- <h1>Ubah Password</h1>
	<form action="{{ url('/editpassword') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
			<div class="form-group">
				<label for="kepada-saran">Email</label>
				<input type="text" class="form-control disabled" value="{{ $user->email }}" disabled>
			</div>
			<div class="form-group">
				<label for="user-name">Current Password</label>
				<input type="text" class="form-control" id="user-name" name="name">
			</div>
			<div class="form-group">
				<label for="biodata-fullname">New Password</label>
				<input type="password" class="form-control" id="biodata-fullname" name="fullname">
			</div>
			<div class="form-group">
				<label for="user-img">Password Confirmation</label>
				<input type="password" class="form-control" id="user-img" name="image">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-primary">Ubah Password</button>
			</div>
	</form> -->
</div>
</div>
</div>
@endsection

@section('js')
<script>
	function readUrl(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			var ValidImagesTypes = ['image/gif', 'image/jpeg', 'image/png'];
			if ($.inArray(input.files[0]['type'], ValidImagesTypes) < 0) {
				alert('File harus berbentuk gambar jpeg/jpg/png/bmp');
			} else {
				reader.onload = function (e) {
					var image = new Image();
					image.src = e.target.result;
					image.onload = function () {
						$('#preview').attr('src', e.target.result);
					};
				};
				reader.readAsDataURL(input.files[0]);			
			}
		}
	}
	$('#user-img').change(function(){
		readUrl(this);
	});
</script>
@endsection
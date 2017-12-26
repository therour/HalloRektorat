@extends('layouts.app')


@section('css')
@endssection

@section('content')
<div class="container" style="padding:61px 0px; background:#ebebeb">
	<form action="{{ url('/kirim') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="judul-saran">Judul</label>
				<input type="text" class="form-control" id="judul-saran" name="title">
			</div>
			<div class="form-group col-md-3">
				<label for="kepada-saran">Kepada</label>
				<input type="text" class="form-control" id="kepada-saran" name="target">
			</div>
			<div class="form-group col-md-6">
				<label for="kepada-saran">Gambar</label>
				<input type="file" class="form-control" id="kepada-saran" name="image">
			</div>
			<div class="form-group col-md-6">
				<label for="kepada-saran">Saran anda</label>
				<textarea type="text" rows="6" class="form-control" id="kepada-saran" name="content"></textarea>
			</div>
			<div class="form-group col-md-6">
				<button type="submit" class="btn btn-primary">Kirim</button>
			</div>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
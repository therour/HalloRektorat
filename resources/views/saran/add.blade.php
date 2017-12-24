@extends('layouts.app')


@section('css')
@endssection

@section('content')
<div class="container" style="padding-top:61px;">
	<form>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="judul-saran">Judul</label>
				<input type="text" class="form-control" id="judul-saran">
			</div>
			<div class="form-group col-md-3">
				<label for="kepada-saran">Kepada</label>
				<input type="text" class="form-control" id="kepada-saran">
			</div>
		</div>
	</form>
</div>
@endsection

@section('js')
@endsection
@extends('layouts.app')


@section('css')
@endssection

@section('content')
<div class="container" style="padding:61px 20px; background:#ebebeb">
	<div class="row">
		<div class="col">
			<form action="{{ url('/kirim') }}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-row">
					<div class="form-group{{ $errors->has('title') ? ' has-danger' : ''}}">
						<label for="judul-saran">Judul</label>
						<input type="text" class="form-control" id="judul-saran" name="title" placeholder="Judul saran yang ingin anda sampaikan">
						@if ($errors->has('title'))
		                    <div class="form-control-feedback">
		                        {{ $errors->first('title') }}
		                    </div>
		                @endif
					</div>
					<div class="form-group{{ $errors->has('title') ? ' has-danger' : ''}}">
						<label for="kepada-saran">Kepada</label>
						<select class="form-control" id="kepada-saran" name="pilihtarget">
							<option selected disabled>-- Kepada --</option>
							<option value="1">Rektorat</option>
							<option value="2">Fakultas</option>
							<option value="3">Jurusan</option>
						</select>
						<div id="targetLanjut">
						</div>
						@if ($errors->has('target'))
		                    <div class="form-control-feedback">
		                        {{ $errors->first('target') }}
		                    </div>
		                @endif
					</div>
					<div class="form-group{{ $errors->has('title') ? ' has-danger' : ''}}">
						<label for="image-saran">Gambar</label>
						<input type="file" class="form-control" id="image-saran" name="image">
						@if ($errors->has('image'))
		                    <div class="form-control-feedback">
		                        {{ $errors->first('image') }}
		                    </div>
		                @endif
					</div>
					<div class="form-group{{ $errors->has('title') ? ' has-danger' : ''}}">
						<label for="isi-saran">Saran anda</label>
						<textarea type="text" rows="6" class="form-control" id="isi-saran" name="content"></textarea>
						@if ($errors->has('content'))
		                    <div class="form-control-feedback">
		                        {{ $errors->first('content') }}
		                    </div>
		                @endif
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col">
			<img id="preview" width="100%" style="border:none">
		</div>
			
		</div>
	</div>
@endsection

@section('js')
<script>
	function showField(select) {
		var	options = [];
		var pilihan = select.options[select.selectedIndex].value;
		var datadump = '{"data":[{"name": " Gagal menyambungkan...", "id": 1}]}';
		
		$.ajax({
			url:"{{ url('/targets') }}" + "/" + pilihan, 
			success: function (response) {
				var jsonTargets = JSON.parse(response).data
				jsonTargets.forEach( function(item, index) {
					options.push($("<option></option>").attr("value", item.id).text(item.name))
				});
			}, 
			error: function (jqXHR, exception) {
				var jsonTargets = JSON.parse(datadump).data
				jsonTargets.forEach( function(item, index) {
					options.push($("<option></option>").attr("value", item.id).text(item.name))
				});
			},
			async:false
		});

		console.log(options)
		$("#targetLanjut").replaceWith(
        	$("<select></select>")
            .attr("name", "target")
            .attr("id", "targetLanjut")
            .attr("class", "form-control")
            .attr("data-live-search", "true")
            .append([$("<option></option>").attr("selected",'').text("Silahkan Pilih")])
            .append(
            	options
            )
        );
	}
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
$(document).ready(function () {
	$('#kepada-saran').change(function () {
		showField(this);
	});
	$('#image-saran').change(function(){
		readUrl(this);
	});
})
</script>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/kirim-saran-baru.css') }}">
<style>
	body {
		background:#f3f3f3;
	}
</style>
@endsection

@section('content')
<div class="container" id="kirimsaran" style="padding:100px 200px; height:100vh;" >
	<!-- <div class="row align-items-center"> -->
	<div class="col" style="float: none; margin: 0 auto">
	    <div class="stepwizard">
	        <div class="stepwizard-row setup-panel">
	            <div class="stepwizard-step">
	                <a href="#step-1" role="button" class="btn btn-primary btn-circle"">1</a>
	                <p>Judul</p>
	            </div>
	            <div class="stepwizard-step">
	                <a href="#step-2" role="button" class="btn btn-secondary btn-circle" disabled="disabled">2</a>
	                <p>Tentukan Pengambil Keputusan</p>
	            </div>
	            <div class="stepwizard-step">
	                <a href="#step-3" role="button" class="btn btn-secondary btn-circle" disabled="disabled">3</a>
	                <p>Tulis Saranmu</p>
	            </div>
	            <div class="stepwizard-step">
	                <a href="#step-4" role="button" class="btn btn-secondary btn-circle" disabled="disabled">4</a>
	                <p>Tambah Foto</p>
	            </div>
	            <div class="stepwizard-step">
	                <a href="#step-5" role="button" class="btn btn-secondary btn-circle" disabled="disabled">5</a>
	                <p>Selesai</p>
	            </div>
	        </div>
	    </div>
	    <form role="form" style="margin-top: 50px">
	        <div class="row setup-content" id="step-1">
	            <div class="col-12">
	                <div class="col-md-12">
	                    <h3 class="judul"> Tulis judul saranmu </h3>
	                    <div class="form-group">
	                        <label class="deskripsi form-control-label">Jelaskan secara singkat dan raih perhatian para pembaca.</label>
	                        <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Apa yang ingin kamu capai"/>
	                    </div>
	                    <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
	                </div>
	            </div>
	        </div>
	        <div class="row setup-content" id="step-2">
	            <div class="col-12">
	                <div class="col-md-12">
	                    <h3 class="judul"> Tentukan siapa pengambil keputusanmu </h3>
	                    <div class="form-group">
	                        <label class="deskripsi form-control-label">
	                            Ini adalah tingkat manajemen yang bisa membuat keputusan untuk menyelesaikan masalahmu. Seperti Jurusan, Fakultas atau Rektorat itu sendiri. HalloRektorat akan mengirim kepada mereka update tentang saranmu dan kami akan mendorong mereka untuk merespon.
	                        </label>
	                        <select class="form-control selects">
	                            <option>Rektorat</option>
	                            <option>Fakultas</option>
	                            <option>Jurusan</option>
	                        </select>
	                    </div>
	                    <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
	                </div>
	            </div>
	        </div>
	        <div class="row setup-content" id="step-3">
	            <div class="col-12">
	                <div class="col-md-12">
	                    <h3 class="judul"> Tulis Saranmu </h3>
	                    <div class="form-group">
	                        <label class="deskripsi form-control-label">
	                            Jelaskan saran yang kamu miliki.
	                        </label>
	                        <textarea class="form-control" rows="6" placeholder="Jelaskan masalah yang ingin kamu selesaikan"></textarea>
	                    </div>
	                    <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
	                </div>
	            </div>
	        </div>
	        <div class="row setup-content" id="step-4">
	            <div class="col-12">
	                <div class="col-md-12">
	                    <h3 class="judul"> Tambah foto </h3>
	                    <div class="form-group">
	                        <label class="deskripsi form-control-label">
	                            Beri para pembaca gambaran visual dari saranmu.
	                        </label>
	                        <input type="file" class="form-control-file">
	                    </div>
	                    <button class="lanjut btn btn-primary nextBtn float-xs-right" type="button">Lanjut</button>
	                </div>
	            </div>
	        </div>
	        <div class="row setup-content" id="step-5">
	            <div class="col-12">
	                <div class="col-md-12">
	                    <h3 class="judul"> Terimakasih sudah memberikan saran! </h3>
	                    <label class="deskripsi form-check-label">
	                        <input type="checkbox" class="form-check-input">
	                        Saya bertanggung jawab terhadap seluruh hal yang saya tulis.
	                    </label>
	                    <br>
	                    <button class="lanjut btn btn-success float-xs-right" type="submit">Selesai</button>
	                </div>
	            </div>
	        </div>
	    </form>
	</div>
<!-- </div> -->
</div>
@endsection

@section('js')
    <script src="{{ asset('js/kirim-saran.js') }}" type="text/javascript"></script>
@endsection
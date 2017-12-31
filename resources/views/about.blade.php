@extends('layouts.app')

@section('css')
		<link rel="stylesheet" href="{{ asset('css/tentang.css') }}">

@endsection
@section('content')
<!-- content -->
<div class="container" style="margin-top: 150px;">
    <div class="row justify-content-between">
        <div class="col-md-6">
            <h1 class="head-brand"> Hallo </h1>
            <h1 class="head-brand"> Rektorat </h1>
            <p class="desc-brand">
                HalloRektorat adalah platform yang didesain untuk mengakomodir saran-saran civitas academica Universitas Islam Indonesia terhadapa layanan-layanan yang ada.
                <br><br>
                Diharapkan dengan adanya HalloRektorat, civitas academica mampu memberi dan memantau aspirasi yang mereka berikan kepadana manajamen UII.
                Serta manajamen UII bida mendapatkan data-data yang dibutuhkan untuk mengevaluasi dan meningkatkan kinerja mereka. 
            </p>
        </div>
        <div class="col-md-6">
            <div class="row" style="padding: 15px">
                <div class="media" style="margin-bottom: 60px">
                    <img class="align-self-center img-profile" src="{{ asset('img/profile/default.jpg') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="name-profile"> Muhammad Nizomuddin FS </h5>
                        <p class="desc-profile"> 16523071</p>
                        <p class="desc-profile"> Teknik Informatika</p>
                    </div>
                </div>
                <div class="media" style="margin-bottom: 60px">
                    <img class="align-self-center img-profile" src="{{ asset('img/profile/default.jpg') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="name-profile"> Muhammad Arnesz Setiawan </h5>
                        <p class="desc-profile"> 16523202</p>
                        <p class="desc-profile"> Teknik Informatika</p>
                    </div>
                </div>
                <div class="media" style="margin-bottom: 60px">
                    <img class="align-self-center img-profile" src="{{ asset('img/profile/default.jpg') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="name-profile"> Muhammad Nadhif Fuadi </h5>
                        <p class="desc-profile"> 16523230</p>
                        <p class="desc-profile"> Teknik Informatika</p>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
@section('js')
@endsection

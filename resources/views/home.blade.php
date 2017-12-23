@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/coba.css') }}"> -->
    <style>
    body {
        background:#ebebeb;
    }
    .origin-container {
    width: 100%;
    height: 100vh;
    overflow: hidden;
    }
        .intro {
    position: absolute;
    top: 0;
    padding-top: 200px;
    padding-bottom: 150px;
    text-align: center;
}

.intro-title {
    font-family: 'Circular Std Bold';
    font-size: 38px;
    margin-bottom: 15px;
}

.intro-desc {
    font-family: 'Roboto';
    font-weight: 300;
    font-size: 20px;
    margin-bottom: 10px;
    color: grey;
}

.intro-btn {
    font-family: 'Circular Std Bold';
    font-size: 20px;
    margin: 25px 0px 50px 0px;
    padding: 15px 20px;
    border-radius: 7px;
}

.intro-btn:link, .intro-btn:visited {
    text-decoration: none;
    background: #1769e0;
    color: white;
}

.intro-btn:hover, .intro-btn:active {
    opacity: 0.7;
}
/* core style 
----------------------------------------------------
*/
.cloud {
    position: relative;
    background: white url('http://localhost:8000/bg-cloud.png');
    background-repeat: repeat-x;
    /* background-size: cover; */
    height: 80vh;
    margin-top: 61px;
    animation: animate 100s linear infinite;
}

.masjid {
    position: absolute;
}

@keyframes animate {
    from {
        background-position: 0 0;
    }
    to {
        background-position: 10000px 0;
    }
}
    </style>
@endsection

@section('content')

<!-- INTRO -->
<div class="origin-container">
    <div class="cloud"></div>
    <div> 
        <img class="img-fluid" style="bottom:0; position:absolute;" src="{{ asset('bg-core.png') }}">
    </div>
    <div>
        <div class="intro col-sm-12">
            <h1 class="intro-title"> Rektorat Membutuhkan Saranmu! </h1>
            <h2 class="intro-desc"> Sekarang kamu tahu kepada siapa harus menyampaikan permasalahan UII. Kirim saranmu. </h2>
            <h2 class="intro-desc"> Jadilah solusi untuk UII. </h2>
            <div class="row"> 
                <a class="intro-btn ml-auto mr-auto" href="#"> 
                    Kirim Saran <i class="fa fa-chevron-right align-center" aria-hidden="true" style="margin-left: 20px;"> </i> 
                </a> 
            </div>
        </div>
    </div>
</div>

<!-- CAROUSEL -->
@include('home.carousel')

<!-- POST -->
<div class="container" style="background:#ebebeb;">
    @for ($i =0; $i < 4; $i++)
    <div class="col-md-8" style="margin-top: 30px; padding: 0px;">
        <div class="card">
            <div class="card-header">
                <div class="content-header">
                    <span class="content-date"> Dikirim </span> 
                    Kamis 24 Agustus 2017
                </div>
            </div>
            <a href="#">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card-body">
                            <h4 class="content-title"> Perluas parkiran FTI pak bu, sudah tidak muat lagi ini </h4>
                            <p>
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. 
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <img class="card-img-top img-thumbnail-content" src="{{asset('parkir.jpg')}}" alt="Card image cap" width="100%" height="100%">
                    </div>
                </div>
            </a>
            <div class="card-footer">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="media">
                            <div class="media-left media-middle">
                                <img class="img-profile" src="{{asset('profile.jpg')}}">
                            </div>
                            <div class="media-body">
                                <p class="name-profile"> Patria Annisa </p>
                                <p class="d-none d-md-block major-profile"> Pendidikan Bahasa Inggris</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="media">
                            <div class="media-body" >   
                                <p class="name-profile"> <i class="fa fa-heart-o carousel-statistic" aria-hidden="true"></i> 1000 </p>
                                <p class="d-none d-md-block major-profile"> Pendukung </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="media">
                            <div class="media-body">   
                                <!-- Singkatan  -->
                                <p class="d-block d-md-none name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> FMIPA </p>
                                <!-- Nama Panjang -->
                                <p class="d-none d-md-block name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> Fakultas Matematika dan Ilmu Pengetahuan Alam </p>
                                <p class="d-none d-md-block major-profile"> Ditujukan </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor

    <div class="container">
        <div class="col-md-8" style="padding: 0px;"> 
            <a href="#">
                <div class="loadmore"> 
                    Load More  
                </div>
            </a>
        </div>    
    </div>
</div>

<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 text-center">
                <img src="{{ asset('logo.png') }}" style="width: 50px; margin-right: 20px;">
                <img src="{{ asset('logo3.png') }}" style="width: 200px;">
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 20px;">
            <div class="col-sm-12 text-center">
                <a class="footer-link" href="#"> Home </a>
                <a class="footer-link" href="#"> Tentang Kami </a>
                <a class="footer-link" href="#"> Kontak </a>
                <a class="footer-link" href="#"> FAQ </a>
            </div>
        </div>
        <div class="row justify-content-center" style="margin-top: 10px;">
            <div class="col-sm-12 text-center">
               <p class="footer-copyright">
                   &copy; 2017 HalloRektorat All rights reserved. Made with blood and tears.
               </p>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
@endsection
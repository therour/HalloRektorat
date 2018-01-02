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
    background: white url('{{ asset('bg-cloud.png') }}');
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

/* button support
----------------------------------------------------------
*/

.support, .supported {
    padding:0px;
    cursor:pointer;
}
.supported {
    color:red;
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
                @if (Auth::user()->jabatan == 'admin')
                <a class="btn btn-secondary btn-lg ml-auto mr-auto disabled" href="#">Kirim Saran <i class="fa fa-chevron-right"></i></a>
                @else
                <a class="btn btn-primary btn-lg ml-auto mr-auto" href="#" data-toggle="modal" data-target="#kirimsaran"> 
                    Kirim Saran <i class="fa fa-chevron-right align-center" aria-hidden="true"> </i> 
                </a> 
                @endif
            </div>
        </div>
    </div>
</div>

<!-- CAROUSEL -->
@include('home.carousel')

<!-- POST -->
<div class="container" style="background:#ebebeb;">
    @foreach ($sarans as $saran)
    <div class="col-md-8" style="margin-top: 30px; padding: 0px;">
        <div class="card">
            <div class="card-header">
                <div class="content-header">
                    <span class="content-date"> Dikirim </span> 
                    <a href="{{ url('/saran/'.$saran->id) }}">
                        {{ $saran->created_at->formatLocalized('%A %d %B %Y %H:%M') }}
                    </a>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="card-body">
                            <a href="{{ url('/saran/'.$saran->id) }}">
                                <h4 class="content-title"> {{ $saran->title }} </h4>
                            </a>
                            <p>
                                {!! str_limit($saran->content, 200, ' Read More...') !!} 
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <img class="card-img-top img-thumbnail-content" src="{{ $saran->image_path }}" alt="Card image cap" width="100%" height="100%">
                    </div>
                </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col col-md-6">
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="{{ url('/profile/'.$saran->user->id) }}">
                                    <img class="img-profile" src="{{ $saran->user->imageProfile() }}">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('/profile/'.$saran->user->id) }}">
                                    <p class="name-profile"> {{ $saran->user->biodata->fullname }} </p>
                                </a>
                                <p class="d-none d-md-block major-profile"> {{ $saran->user->biodata->jurusan->nama }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="media">
                            <div class="media-body">
                                <form action="{{ url('/support') }}" method="POST" class="dukung">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="saran_id" value="{{ $saran->id }}">
                                    <button type="submit" class="btn btn-link {{ $saran->isSupported() ? 'supported' : 'support' }}"><i class="fa fa-heart{{ $saran->isSupported() ? '' : '-o'}} carousel-statistic" aria-hidden="true"></i></button> <span class="jmlDukungan">{{ count($saran->supports) }}</span>
                                </form>
                                <p class="d-none d-md-block major-profile">Dukungan </p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-3">
                        <div class="media">
                            <div class="media-body">   
                                <!-- Singkatan  -->
                                <p class="d-block d-md-none name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> {{ $saran->target->singkatan() }} </p>
                                <!-- Nama Panjang -->
                                <p class="d-none d-md-block name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> {{ $saran->target->name }} </p>
                                <p class="d-none d-md-block major-profile"> Ditujukan </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="container">
        <div class="col-md-8" style="padding: 0px;"> 
            <center>{{ $sarans->links() }}</center>
        </div>    
    </div>
</div>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.dukung').on('submit', function (e) {
                $.ajaxSetup({
                    header:$('meta[name="_token"]').attr('content')
                })
                form = $(this)
                e.preventDefault(e);
                var url = $('meta[name="base_url"]').attr('content');
                $.ajax({
                    type:"POST",
                    url:url + "/support",
                    data:$(this).serialize(),
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        form.children("span").text(response.count);
                        if (response.tambah) {
                            form.children("button").removeClass("support").addClass("supported");
                            form.children("button").children("i").removeClass("fa-heart-o").addClass("fa-heart");
                        } else {
                            form.children("button").removeClass("supported").addClass("support");
                            form.children("button").children("i").removeClass("fa-heart").addClass("fa-heart-o");
                        }
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });
        });
    </script>
@endsection
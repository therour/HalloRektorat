@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/telusuri.css') }}">
@endsection

@section('content')
<div class="container" style="margin-top: 80px">
    <!-- filter -->
    <div class="row" style="margin-top: 50px;">
        <div class="col-sm-12">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Urutkan Berdasar
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Popularity</a>
                    <a class="dropdown-item" href="#">Newest</a>
                    <a class="dropdown-item" href="#">Latest</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        @for ($i = 0; $i < 6; $i++)
        <!-- START CARD -->
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <a href="#">
                    <div class="card-body">
                        <div>
                            <img class="card-img-top img-thumbnail" src="{{ asset('parkir.jpg') }}" alt="Card image cap" style="padding: 0px">
                        </div>
                        <small class="text-muted"> 3 mins ago </small>
                        <h1 class="title"> Beri Mahasiswa Transparansi Transkrip Nilai </h1>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-8">
                                
                                <div class="media" style="">
                                    <div class="media-left media-middle">
                                        <img class="img-profile" src="{{ asset('profile.jpg') }}">
                                    </div>
                                    <div class="media-body">
                                        <p class="statistic-profile"> uvuvwevwevwe onyetenyevwe ugwemubwem ossas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="statistic-profile text-center"> <i class="fa fa-envelope-o" aria-hidden="true"></i> FMIPA </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="statistic-profile"><i data-toggle="tooltip" data-placement="top" title="1000" class="fa fa-heart-o" aria-hidden="true"></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- END CARD -->
        @endfor
    </div>
</div>
@endsection

@section('js')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection
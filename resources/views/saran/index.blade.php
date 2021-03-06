@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/telusuri.css') }}">
<style>
    .supported {
        color:red;
    }
</style>
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
                    <a class="dropdown-item" href="{{ url('/sarans/populer') }}">popularitas</a>
                    <a class="dropdown-item" href="{{ url('/sarans/terbaru') }}">Terbaru</a>
                    <a class="dropdown-item" href="{{ url('/sarans/komentar') }}">Komentar terbanyak</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-between">
        @if (count($sarans) > 0)
        @foreach ($sarans as $saran)
        <!-- START CARD -->
        <div class="col-sm-12 col-md-4 col-xl-3">
            <div class="card">
                <a href="{{ url('/saran/'.$saran->id) }}">
                    <div class="card-body" style="height:280px">
                        <div style="height:200px">
                            <img class="card-img-top img-thumbnail" src="{{ $saran->image_path }}" alt="Card image cap" style="padding: 0px; width:100%; height:100%; object-fit:contain;">
                        </div>
                        <small class="text-muted"> {{ $saran->created_at->diffForHumans() }} </small>
                        <h1 class="title" title=""> {{ str_limit($saran->title, 50, '...') }} </h1>
                    </div>
                </a>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-8">
                            
                            <div class="media" style="">
                                <div class="media-left media-middle">
                                    <a href="{{ url('/profile/'.$saran->user->id) }}">
                                        <img class="img-profile" src="{{ $saran->user->imageProfile() }}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="{{ url('/profile/'.$saran->user->id) }}">
                                        <p class="statistic-profile" data-toggle="tooltip" data-placement="top" title="{{ $saran->user->biodata->fullname }}">{{ $saran->user->name }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="media">
                                <div class="media-body">   
                                    <p class="statistic-profile text-center" title="{{ $saran->target->name }}" data-toggle="tooltip" data-placement="top"> <i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $saran->target->singkatan() }} </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="media">
                                <div class="media-body">  
                                <!-- <form action="{{ url('/support') }}" method="POST" id="support{{ $saran->id }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="saran_id" value="{{ $saran->id }}"> -->
                                </form>
                                <!-- href="{{ url('/supportThis') }}" onclick="event.preventDefault(); document.getElementById('support{{$saran->id}}').submit();" -->
                                   <a>
                                    
                                       <p class="statistic-profile"><i data-toggle="tooltip" data-placement="top" title="{{ count($saran->supports) }}" class="fa fa-heart{{ $saran->isSupported() ? ' supported' : '-o' }}" aria-hidden="true"></i> {{ count($saran->supports) }}</p>
                                   </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CARD -->
        @endforeach
        @else
        <div class="col">
            
        <center><h5>Hasil pencarian tidak menemukan kata "{{ $_GET['cari'] }}"</h5></center>
        </div>
        @endif

        {{ $sarans->links() }}
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
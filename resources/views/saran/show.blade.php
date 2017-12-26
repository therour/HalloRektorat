@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/buka-saran.css')}}">
<style>
    .support {
        padding:0px;
    }
    .supported {
        color:red   ;
    }
</style>
@endsection

@section('content')

<!-- content -->
<div class="container" style="margin-top: 80px">
    <div class="row">
        <!-- main col left -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="padding: 20px;">
                    <div class="media media-middle">
                        <a href="#"><img class="img-profile" src="{{ $saran->user->imageProfile() }}"></a>
                        <div class="media-body">
                            <p class="name-profile"> {{ $saran->user->biodata->fullname }} </p>
                            <p class="major-profile"> {{ $saran->user->biodata->jurusan->nama }} | {{ $saran->created_at->formatLocalized('%A %d %B %Y %H:%M') }}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="title"> {{ $saran->title }} </h1>
                    <h2 class="send-to"> 
                      <span class="box-to"> Kepada </span>  {{ $saran->target->name }} 
                    </h2>
                </div>
                <div style="margin-top: 20px">
                  <img src="{{ $saran->image_path }}" class="img-fluid">
                </div>
                <div class="card-body content"> 
                    <p>
                        {{ $saran->content }}
                    </p>
                </div>
                <br>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body"> 
                                        <form action="{{ url('/support') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="saran_id" value="{{ $saran->id }}">
                                            <p class="name-profile"><button type="submit" class="support btn btn-link"><i class="fa fa-heart{{ $saran->isSupported() ? ' supported' : '-o'}}" aria-hidden="true"></i></button> {{ count($saran->supports) }}</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-comment-o carousel-statistic" aria-hidden="true"></i> {{ count($saran->comments) }} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
            </div>

            <!-- tanggapan -->
            @if (count ($saran->tanggapan()) > 0)
            <div class="card">
                <div class="card-header"> 
                    <p class="tanggapan-header"> Tanggapan </p> 
                </div>
                <div class="card-body">
                    <p> {{ $saran->tanggapan()->first()->content }} </p>
                </div>
            </div>
            @endif
            
            <hr>
            
            <!-- comment form -->
            <form action="{{ url('/komentar') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $saran->id }}" name="saran_id">
                <div class="form-group">
                    <textarea name="content" placeholder="Beri komentar ... " class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"> Kirim </button>
            </form>
                

            <!-- comment -->
            @foreach ($comments as $comment)
            <div class="media" style="margin-top: 50px">
                <a href="{{ route('profile', ['user' => $comment->user->id]) }}">
                    <img class="img-comment" src="{{ $comment->user->imageProfile() }}" alt="">
                </a>
                <div class="media-body">
                    <h5 class="name-profile"> {{ $comment->user->biodata->fullname }} </h5>
                    <p>
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
            @endforeach

            <!-- load more bar -->
            <div style="margin-top: 50px; padding: 0px;"> 
                <!-- <a href="#">
                    <div class="loadmore"> 
                        Load More  
                    </div>
                </a> -->
                {{ $comments->links() }}
            </div>    
        </div>

        <!-- main col right -->
        <div class="col-md-4">
            <hr> 
            <div>
                <a href="#" onclick="alert('coming soon');">
                    <i class="fa fa-facebook-official" aria-hidden="true" style="font-size: 30px; color: #3b5998;"> 
                        <p class="share"> Kirim pesan Facebook </p>
                    </i> 
                </a> 
            </div>
            <hr>
            <div> 
                <a href="#" onclick="alert('coming soon');">
                    <i class="fa fa-twitter-square" aria-hidden="true" style="font-size: 30px; color: #00aced;"> 
                        <p class="share"> Tweet ke pengikutmu </p>
                    </i> 
                </a>
            </div>
            <hr>
            <div> 
                <a href="#" onclick="alert('coming soon');">
                    <i class="fa fa-commenting" aria-hidden="true" style="font-size: 30px; color: #00c300"> 
                        <p class="share"> Bagikan di linimasa </p> 
                    </i>
                </a>
            </div>
            <hr>
            <div> 
                <a href="#" onclick="alert('coming soon');">
                    <i class="fa fa-link" aria-hidden="true" style="font-size: 30px; color: black"> 
                        <p class="share"> Copy link  </p>
                    </i>
                </a>
            </div>
            <hr>
             <form action="{{ url('/support') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="saran_id" value="{{ $saran->id }}">
                <button type="submit" class="btn form-control {{ $saran->isSupported() ? 'btn-danger' : 'btn-primary'}}">
                    {{ $saran->isSupported() ? 'Urungkan dukungan' : 'Ikut dukung' }}
                </button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
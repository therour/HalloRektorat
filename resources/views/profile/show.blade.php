@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<style>
	.card-body {
		padding:1.25rem;
	}
	a {
		color:black;
	}
</style>
@endsection
@section('content')
<div class="container" style="margin-top: 80px">
    <div class="row">
        <!-- main col left -->
        <div class="col-md-3">
            <div class="card">
                <img src="{{url('profile.jpg')}}" class="img-fluid">
                <div class="card-body">
                    <h1 class="id-name"> {{ $user->biodata->fullname }} </h1>
                    <h2 class="id-info"> {{ $user->biodata->nim }} </h2> 
                    <h2 class="id-info"> {{ $user->biodata->jurusan->nama }} </h2>
                </div>
            </div>
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        {{ count($user->sarans) }} Saran
                    </li>
                    <li class="list-group-item">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        {{ count($user->supports) }} kali mendukung
                    </li>
                </ul>
            </div>
        </div>
        <!-- main col right -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <h4 style="background: #fb8f8f;"> Linimasa </h4>
                    <p>With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            @foreach ($user->sarans as $saran)
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h4 style="background: #ffb989;"> Kiriman </h4>
                            <small class="text-muted"> <a href="{{ url('/saran/'.$saran->id)}}">{{$saran->created_at->diffForHumans() }}</a> </small>
                            <h3><a href="{{ url('/saran/'.$saran->id)}}"> {{ $saran->title }} </a></h3>
                            <p>
                                {{ $saran->content }}
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img class="card-img-top img-thumbnail" src="{{ $saran->image_path }}" alt="Card image cap">
                    </div>
                </div>
            </div>
            @endforeach
           <!--  <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h4 style="background: #ffb989;"> Kiriman </h4>
                            <small class="text-muted"> Kamis 24 Agustus 2017 </small>
                            <h3> Beri mahasiswa transparansi transkrip nilai </h3>
                            <p>
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img class="card-img-top img-thumbnail" src="../assets/transkrip-nilai.png" alt="Card image cap">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h4 style="background: #ffb989;"> Kiriman </h4>
                            <small class="text-muted"> Jumat 1 Januari 2017 </small>
                            <h3> Pak dosen. Jangan pindah-pindah jadwal kelas sesuka hati anda </h3>
                            <p>
                                This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <img class="card-img-top img-thumbnail" src="../assets/kelas-kosong.jpg" alt="Card image cap">
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection

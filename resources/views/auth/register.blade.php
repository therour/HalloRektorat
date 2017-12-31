@extends('auth.template')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center" style="height:100vh">
        <div class="col" style="background:#eee; padding:50px">
            <div style="float:right;">
                <a href="{{ route('login') }}" class="btn btn-secondary">
                    Punya akun <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <h1><img src="{{ asset('logo.png') }}" width="50"> Daftar akun baru</h1>
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nama</label>

                    <div class="col-md-10">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 control-label">Alamat Email</label>

                    <div class="col-md-10">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label for="password" class="col-md-4 control-label">Kata Sandi</label>

                    <div class="col-md-10">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Ulang Kata Sandi</label>

                    <div class="col-md-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Daftar
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col d-sm-none d-md-block">
            <div class="row justify-content-center" style="padding:50px;">
                <img src="{{ asset('logo2.png') }}" width="100%" height="100%">
            </div>
        </div>
    </div>
</div>

@endsection

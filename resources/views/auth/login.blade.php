@extends('auth.template')

@section('content')
<div class="container-fluid">
    <div class="row align-items-center" style="height:100vh">
        <div class="col d-sm-none d-md-block">
            <div class="row justify-content-center" style="padding:50px">
                <img src="{{ asset('logo2.png') }}" width="100%" height="100%">
            </div>
        </div>
        <div class="col" style="background:#eee; padding:50px">
            <div style="float:right;">
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    Belum punya akun <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <h1><img src="{{ asset('logo.png') }}" width="50"> Masuk</h1>
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 control-label">Alamat Email</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <div class="form-control-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                    <label for="password" class="col-md-4 control-label">Kata Sandi</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <div class="form-control-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingat Saya
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Masuk
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

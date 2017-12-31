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
                <a href="{{ route('login') }}" class="btn btn-secondary">
                    Login <i class="fa fa-chevron-right"></i>
                </a>
            </div>
            <h1><img src="{{ asset('logo.png') }}" width="50"> Reset Password</h1>
            <br>
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="form-control-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

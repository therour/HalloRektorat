<nav class="navbar fixed-top navbar-expand-md navbar-layout">

    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('logo3.png') }}" alt="{{ config('app.name', 'Hallo') }}" style="width:150px; margin-bottom:7px;">        
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="fa fa-bars" aria-hidden="true"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{-- route('kirimsaran') --}}">Kirim Saran</a> -->
                    @if (Auth::user()->jabatan == 'admin')
                    <a class="nav-link text-muted" title="Admin tidak bisa menambah saran">Kirim Saran</a>
                    @else
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#kirimsaran">Kirim Saran</a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('telusur') }}">Telusur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                	<form class="form-inline my-2 my-lg-0" action="{{ url('/saran') }}" method="GET">
    	                <div class="input-group">
    				      <input type="text" class="form-control form-control-sm nav-search" placeholder="Pencarian" aria-label="Cari..." name="cari">
    				      <span class="input-group-btn">
    				        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
    				      </span>
    				    </div>
                	</form>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/profile/'.Auth::user()->id)}}">Profil</a>
                        <a class="dropdown-item" href="#">Saranku</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Keluar
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

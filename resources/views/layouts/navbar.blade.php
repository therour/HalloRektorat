<nav class="navbar navbar-toggleable-md fixed-top navbar-layout" style="background:white;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-ico fa fa-bars"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
        	<img src="{{ asset('logo3.png') }}" alt="{{ config('app.name', 'Hallo') }}" style="width:150px; margin-bottom:7px;">       	
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('kirimsaran') }}">Kirim Saran<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('telusur') }}">Telusur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tentang</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            <li>
            	<form class="form-inline my-2 my-lg-0">
	                <!-- <input class="form-control mr-sm-2" type="text" placeholder="Search"> -->
	                <div class="input-group">
				      <input type="text" class="form-control form-control-sm nav-search" placeholder="Pencarian" aria-label="Search for...">
				      <span class="input-group-btn">
				        <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
				      </span>
				    </div>
	                <!-- <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button> -->
            	</form>
            </li>
<!--                 <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                </li> -->
        
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ url('/profile/'.Auth::user()->id)}}">Profil</a>
                        <a class="dropdown-item" href="#">Saranku</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

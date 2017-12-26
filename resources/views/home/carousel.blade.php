<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!-- carousel 1 -->
        @foreach ($carousels as $i => $saran)
        <div class="carousel-item{{ $i == 0 ? ' active' : ''}}">
            <div class="container">
                <div class="card">
                    <!-- <a href="#"> -->
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img class="card-img-top img-thumbnail" src="{{ $saran->image_path }}" alt="Card image cap">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card-body">
                                    <h3 class="popular"> Popular </h3>
                                    <a href="{{ url('/saran/'.$saran->id)}}">
                                        <small class="text-muted"> {{$saran->created_at->diffForHumans() }} </small>
                                        <h4 class="carousel-title"> {{ $saran->title }}  </h4>
                                    </a>
                                        <p>
                                            {{ $saran->content }}
                                        </p>
                                </div>
                            </div>
                        </div>
                    <!-- </a> -->
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <a href="{{ url('/profile/'.$saran->user->id) }}">
                                            <img class="img-profile" src="{{url('profile.jpg')}}">
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
                            <div class="col">
                                <div class="media">
                                    <div class="media-body">   
                                        <form action="{{ url('/support') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="saran_id" value="{{ $saran->id }}">
                                            <button type="submit" class="btn btn-link {{ $saran->isSupported() ? 'supported' : 'support' }}"><i class="fa fa-heart{{ $saran->isSupported() ? '' : '-o'}} carousel-statistic" aria-hidden="true"></i></button> {{ count($saran->supports) }}
                                        </form>
                                        <p class="d-none d-md-block major-profile">Pendukung </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                               <div class="media">
                                    <div class="media-body">  
                                        <!-- Singkatan  -->
                                        <p class="d-block d-md-none name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> FMIPA </p>
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
        </div>
        @endforeach
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <i class="fa fa-chevron-left" style="color: grey; font-size: 1.5em; margin-right: 50px;"></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <i class="fa fa-chevron-right" style="color: grey; font-size: 1.5em; margin-left: 50px"></i>
        </a>
    </div>
</div>
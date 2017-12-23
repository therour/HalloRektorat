<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!-- carousel 1 -->
        @for ($i = 0; $i < 3; $i++)
        <div class="carousel-item{{ $i == 0 ? ' active' : ''}}">
            <div class="container">
                <div class="card">
                    <!-- <a href="#"> -->
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img class="card-img-top img-thumbnail" src="{{url('parkir.jpg')}}" alt="Card image cap">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card-body">
                                    <h3 class="popular"> Popular </h3>
                                    <small class="text-muted"> 3 mins ago </small>
                                    <h4 class="carousel-title"> Perluas parkiran FTI pak bu, sudah tidak muat lagi ini </h4>
                                    <p>
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
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
                                        <img class="img-profile" src="{{url('profile.jpg')}}">
                                    </div>
                                    <div class="media-body">    
                                        <p class="name-profile"> Patria Annisa </p>
                                        <p class="d-none d-md-block major-profile"> Pendidikan Bahasa Inggris</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-heart-o carousel-statistic" aria-hidden="true"></i> 1000 </p>
                                        <p class="d-none d-md-block major-profile"> Pendukung </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                               <div class="media">
                                    <div class="media-body">  
                                        <!-- Singkatan  -->
                                        <p class="d-block d-md-none name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> FMIPA </p>
                                        <!-- Nama Panjang -->
                                        <p class="d-none d-md-block name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> Fakultas Matematika dan Ilmu Pengetahuan Alam </p>
                                        <p class="d-none d-md-block major-profile"> Ditujukan </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
        <!-- carousel 2 -->
        <!-- <div class="carousel-item">
            <div class="container">
                <div class="card">
                    <a href="#">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img class="card-img-top img-thumbnail" src="../assets/parkir.jpg" alt="Card image cap">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card-body">
                                    <h3 class="popular"> Popular </h3>
                                    <small class="text-muted"> 3 mins ago </small>
                                    <h4 class="carousel-title"> Perluas parkiran FTI pak bu, sudah tidak muat lagi ini </h4>
                                    <p>
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-4">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <img class="img-profile" src="../assets/profile.jpg">
                                    </div>
                                    <div class="media-body">
                                        <p class="name-profile"> Patria Annisa </p>
                                        <p class="major-profile"> Pendidikan Bahasa Inggris</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-heart-o carousel-statistic" aria-hidden="true"></i> 1000 </p>
                                        <p class="major-profile"> Pendukung </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                               <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> Fakultas Matematika dan Ilmu Pengetahuan Alam </p>
                                        <p class="major-profile"> Ditujukan </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                  
        carousel 3
        <div class="carousel-item">
            <div class="container">
                <div class="card">
                    <a href="#">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <img class="card-img-top img-thumbnail" src="../assets/parkir.jpg" alt="Card image cap">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="card-body">
                                    <h3 class="popular"> Popular </h3>
                                    <small class="text-muted"> 3 mins ago </small>
                                    <h4 class="carousel-title"> Perluas parkiran FTI pak bu, sudah tidak muat lagi ini </h4>
                                    <p>
                                        This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-4">
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <img class="img-profile" src="../assets/profile.jpg">
                                    </div>
                                    <div class="media-body">
                                        <p class="name-profile"> Patria Annisa </p>
                                        <p class="major-profile"> Pendidikan Bahasa Inggris</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-heart-o carousel-statistic" aria-hidden="true"></i> 1000 </p>
                                        <p class="major-profile"> Pendukung </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-5">
                               <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-envelope-o carousel-statistic" aria-hidden="true"></i> Fakultas Matematika dan Ilmu Pengetahuan Alam </p>
                                        <p class="major-profile"> Ditujukan </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <i class="fa fa-chevron-left" style="color: grey; font-size: 1.5em; margin-right: 50px;"></i>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <i class="fa fa-chevron-right" style="color: grey; font-size: 1.5em; margin-left: 50px"></i>
        </a>
    </div>
</div>
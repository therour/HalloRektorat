@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/buka-saran.css')}}">
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
                        <a href="#"><img class="img-profile" src="{{ asset('profile.jpg') }}"></a>
                        <div class="media-body">
                            <p class="name-profile"> Patria Annisa </p>
                            <p class="major-profile"> Pendidikan Bahasa Inggris | Kamis 24 Agustus 2017</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="title"> Beri Mahasiswa Transparansi Transkrip Nilai </h1>
                    <h2 class="send-to"> 
                      <span class="box-to"> Kepada </span>  Fakultas Matematika dan Ilmu Pengetahuan Alam 
                    </h2>
                </div>
                <div style="margin-top: 20px">
                  <img src="{{ asset('transkrip-nilai.png') }}" class="img-fluid">
                </div>
                <div class="card-body content"> 
                    <p>
                        Lorem ipsum dolor sit amet, ut timeam consetetur nam, tractatos mediocrem mei ei. Nibh tota nominati vim ea, ei verterem constituam vix, qui tacimates democritum te. Autem laudem vis ut. Te sumo iisque est sale tollit et per, ea tale aeque consul sed.
                        <br><br>
                        No tale doctus vix. Ornatus minimum disputationi pro et. Vim et alienum disputando. Usu hinc reprehendunt in, reque incorrupte cum ea. Nam ut atqui labore, has ne facete sanctus dolores, eu mea tamquam accusam.
                        <br><br>
                        Ius in iuvaret expetendis, vero dolor virtute an mea. Cum unum noluisse pericula ex, vix ad soluta corrumpit consectetuer. Cu atqui scripserit mel. Nam stet decore democritum ea, oratio audire nam at, mei rebum postea deseruisse ut. Eum ei epicurei evertitur definitionem, sit fierent probatus pertinacia te, ad has esse malis sensibus. Eum et debitis definitiones, nam probo vocent diceret in, omnium tritani ex vel.
                        <br><br>
                        Mea eu iusto indoctum. An laoreet praesent intellegam vel, etiam errem graeco cu est. Sit ex sanctus singulis adipiscing. Vim id facer mundi ridens, an minim labitur omittam qui. Ponderum sadipscing ad mei. Quo te quem theophrastus necessitatibus.
                        <br><br>
                        Has ne persius perfecto necessitatibus, velit exerci alterum eam ut. Ius habeo dictas at, vim ea minim atomorum. Eum brute tractatos et. Ad usu choro populo, homero eligendi ne vix.
                        <br><br>
                        Id per quem alienum recteque, vel an inimicus philosophia, an mei nobis utroque. Vel te sumo mutat viris. Eu case essent philosophia mea. Est te sonet constituto inciderint, id pro cetero expetendis accommodare.
                        <br><br>
                        Minim iuvaret te quo. Mel ei graeco aeterno. Vix dignissim urbanitas id. At graece causae vivendum quo. Case suscipiantur quo at, quo harum suscipiantur cu.
                        <br><br>
                        Cu mundi aliquid electram sed. Ex utinam omnesque tincidunt est. Mel ea ipsum vulputate, no magna populo vis. No cum tota euismod suscipiantur, quem noster debitis ut eam, dicit regione ad vel. Moderatius persequeris quo no, diam atqui populo ad eos, eu paulo scripta electram sea. Ocurreret neglegentur disputationi ea est.
                        <br><br>
                        Quando exerci patrioque nam ad, mel at porro scriptorem. Ut duo regione praesent. Ad erant ridens deserunt pri. Soleat nemore ponderum nam ad, minimum indoctum in usu.
                        <br><br>
                        Ei justo percipitur vix, has ex elitr feugait adipisci, mel ex congue iudico tritani. Novum sonet habemus eos cu, eu veritus propriae quo. Duo an autem quaeque percipitur, no sed altera qualisque scriptorem. Nec prima omnes vocibus et, libris theophrastus id nam.
                    </p>
                </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-heart-o carousel-statistic" aria-hidden="true"></i> 1000 </p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="media">
                                    <div class="media-body">   
                                        <p class="name-profile"> <i class="fa fa-comment-o carousel-statistic" aria-hidden="true"></i> 10 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
            </div>

            <!-- tanggapan -->
            <div class="card">
                <div class="card-header"> 
                    <p class="tanggapan-header"> Tanggapan </p> 
                </div>
                <div class="card-body">
                    <p> This space dedicated for rektorat responses. </p>
                </div>
            </div>
            
            <hr>
            
            <!-- comment form -->
            <form>
                <div class="form-group">
                    <textarea placeholder="Beri komentar ... " class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary"> Kirim </button>
            </form>
                

            <!-- comment -->
            <div class="media" style="margin-top: 50px">
                <a href="#">
                    <img class="img-comment" src="../assets/profile.jpg" alt="">
                </a>
                <div class="media-body">
                    <h5 class="name-profile"> Commenter Name </h5>
                    <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                </div>
            </div>
            <div class="media" style="margin-top: 50px">
                <a href="#">
                    <img class="img-comment" src="../assets/profile.jpg" alt="">
                </a>
                <div class="media-body">
                    <h5 class="name-profile"> Commenter Name </h5>
                    <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                </div>
            </div>
            <div class="media" style="margin-top: 50px">
                <a href="#">
                    <img class="img-comment" src="../assets/profile.jpg" alt="">
                </a>
                <div class="media-body">
                    <h5 class="name-profile"> Commenter Name </h5>
                    <p>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </p>
                </div>
            </div>

            <!-- load more bar -->
            <div style="margin-top: 50px; padding: 0px;"> 
                <a href="#">
                    <div class="loadmore"> 
                        Load More  
                    </div>
                </a>
            </div>    
        </div>

        <!-- main col right -->
        <div class="col-md-4">
            <hr> 
            <div>
                <a href="#">
                    <i class="fa fa-facebook-official" aria-hidden="true" style="font-size: 30px; color: #3b5998;"> 
                        <p class="share"> Kirim pesan Facebook </p>
                    </i> 
                </a> 
            </div>
            <hr>
            <div> 
                <a href="#">
                    <i class="fa fa-twitter-square" aria-hidden="true" style="font-size: 30px; color: #00aced;"> 
                        <p class="share"> Tweet ke pengikutmu </p>
                    </i> 
                </a>
            </div>
            <hr>
            <div> 
                <a href="#">
                    <i class="fa fa-commenting" aria-hidden="true" style="font-size: 30px; color: #00c300"> 
                        <p class="share"> Bagikan di linimasa </p> 
                    </i>
                </a>
            </div>
            <hr>
            <div> 
                <a href="#">
                    <i class="fa fa-link" aria-hidden="true" style="font-size: 30px; color: black"> 
                        <p class="share"> Copy link  </p>
                    </i>
                </a>
            </div>
            <hr>
            <div class="support-box"> ikut dukung </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@endsection
<html lang="en">
    <head>
        <title>Showtime</title>
    </head>
    
    <body>
        <style>
            @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,300italic,400italic,600italic,700italic,800italic);
body {
  background: linear-gradient(rgba(30, 27, 38, 0.95), rgba(30, 27, 38, 0.95)), url("https://i.ibb.co/FDGqCmM/papers-co-ag74-interstellar-wide-space-film-movie-art-33-iphone6-wallpaper.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: repeat;
}

.container {
  width: 100%;
  height: 100%;
}

.cellphone-container {
  width: 375px;
  height: 650px;
  background-color: #1e1b26;
  margin: 60px auto 0 auto;
  box-shadow: 5px 5px 115px -14px black;
  border-radius: 4px;
}

.menu {
  position: absolute;
  right: 12px;
  top: 6px;
  z-index: 999;
}
.menu i {
  font-size: 40px;
  color: #fe4141;
  filter: drop-shadow(4px 4px 10px rgba(0, 0, 0, 0.5));
}

.movie-img {
  width: 100%;
  height: 380px;

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  z-index: 111 !important;
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
  -webkit-mask-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, black), color-stop(0.35, black), color-stop(0.5, black), color-stop(0.65, black), color-stop(0.85, rgba(0, 0, 0, 0.6)), color-stop(1, transparent));
  position: relative;
}

.movie {
  /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+39,1e1b26+53&0+38,1+55 */
  background: -moz-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* FF3.6-15 */
  background: -webkit-linear-gradient(top, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* Chrome10-25,Safari5.1-6 */
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 38%, rgba(255, 255, 255, 0.06) 39%, rgba(30, 27, 38, 0.88) 53%, #1e1b26 55%);
  /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#1e1b26',GradientType=0 );
  /* IE6-9 */
  position: absolute;
  background-size: contain;
  background-size: cover;
  z-index: 1 !important;
  width: 375px;
  height: 660px;
  display: block;
  border-radius: 4px;
}

.text-movie-cont {
  padding: 0px 12px;
  text-align: justify;
}

.action-btn {
  text-align: right;
}
.action-btn i {
  color: #fe4141;
  font-size: 28px;
  text-align: right;
}

.watch-btn {
  display: block;
  border: 1px solid #fe4141;
  border-radius: 5px;
  padding: 4px;
  width: 140px;
}
.watch-btn h3 i {
  font-size: 14px;
  margin-right: 2px;
  position: relative;
  float: left;
  line-height: 1;
}

.time {
  display: block;
  border: 1px solid #fe4141;
  border-radius: 5px;
  padding: 4px;
  width: 70px;
  color: #fe4141;
}
.time h3 i {
  font-size: 14px;
  margin-right: 2px;
  position: relative;
  float: left;
  line-height: 1;
}

.action-row {
  margin-top: 24px;
}

.summary-row {
  margin-top: 12px;
}

/* TYPOGRAPHY STARTS */
/* Fonts */
h1,
h2,
h3,
h4,
h5 {
  font-family: "Montserrat", sans-serif;
  color: #e7e7e7;
  margin: 0px;
}

h1 {
  font-size: 36px;
  font-weight: 400;
}

h3 {
  font-size: 14px;
  font-weight: 400;
  color: #fe4141;
}

h5 {
  font-size: 12px;
  font-weight: 400;
}

.movie-gen, .movie-likes {
  margin: 0px;
  padding: 0px;
}
.movie-gen li, .movie-likes li {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  color: #818181;
  width: auto;
  display: block;
  float: left;
  margin-right: 6px;
  font-weight: 600;
}

.movie-likes {
  float: right;
}
.movie-likes li {
  color: #fe4141;
}
.movie-likes li:last-child {
  margin-right: 0px;
}
.movie-likes li i {
  font-size: 14px;
  margin-right: 4px;
  position: relative;
  float: left;
  line-height: 1;
}

.movie-details {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #b4b4b4;
}

.movie-description {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 400;
  color: #9b9b9b;
  text-align: justify;
  line-height: 1.3;
}

.movie-actors {
  font-family: "Open Sans", sans-serif;
  font-size: 12px;
  font-weight: 300;
  color: #e7e7e7;
  font-style: italic;
}

/* TYPOGRAPHY ENDS */
/** GRID STARTS **/
.thegrid {
  margin: 0 auto;
}

.elements-distance, .movie-details, .movie-description, .movie-actors {
  margin: 0px;
}

.mr-grid {
  width: 100%;
}

.mr-grid:before,
.mr-grid:after {
  content: "";
  display: table;
}

.mr-grid:after {
  clear: both;
}

.mr-grid {
  *zoom: 1;
}

.col1,
.col2,
.col3,
.col3rest,
.col4,
.col4rest,
.col5,
.col5rest,
.col6,
.col6rest,
.col7{
  margin: 0% 0.5% 0.5% 0.5%;
  padding: 1%;
  float: left;
  display: block;
}

/* Columns match, minus margin sum. E.G. margin-left+margin-right=1%, col2=50%-1% - added padding:1%*/
.col1 {
  width: 98%;
}

.col2 {
  width: 47%;
}

.col3 {
  width: 30.3333333333%;
}

.col4 {
  width: 22%;
}

.col5 {
  width: 17%;
}

.col6 {
  width: 13.6666666667%;
}

/* Columns match with their individual number. E.G. col3+col3rest=full width row */
.col3rest {
  width: 63.6666666667%;
}

.col4rest {
  width: 72%;
}

.col5rest {
  width: 77%;
}

.col6rest {
  width: 80.3333333333%;
}

.dribbble-link {
  width: 50px;
  height: 50px;
  position: fixed;
  bottom: 15px;
  right: 15px;
  border-radius: 50px;
}

.link { background:none; border:none; color:#fe4141; text-align:center; }
col7 {
  width: 85px;
}

.custom-form {
    background-color: initial;
    border: initial;
    border-spacing: initial;
    display: inline; /* Set the form to display inline so it doesn't affect the layout */
    font: inherit;
    margin: 0;
    padding: 0;
}

        </style>
       
        <div class="container">
  <div class="cellphone-container">    
      <div class="movie">       
        <div class="menu"><i class="material-icons"></i></div>
      <div class="movie-img" style="background-image: url('/photos/{{$movie->photo}}');"></div>
        <div class="text-movie-cont">
          <div class="mr-grid">
            <div class="col1">
     
           
         <h1>{{$movie->name}}</h1>
            
             
               
              <ul class="movie-gen">
                <li>{{$movie->movieRating}} /</li>
                <li>{{$movie->duration}} min  /</li>
                <li>{{$movie->tag}}</li>
              </ul>
            </div>
          </div>
          <div class="mr-grid summary-row">
            <div class="col2">
              <h5>SHOWTIME</h5>
            </div>
            <div class="col2">
               
            </div>
          </div>
          <div class="mr-grid">
            <div class="col1">
                
      @foreach($showtime as $p)
      <form method="post" action="/movies/hall" class="custom-form">
          @csrf
         <input type="hidden" value="{{$p->showtimeid}}" name="showtimeId"/>
         
                <div class="col7"> <div class="time"><button type="submit" class="link">{{ $p->startTime }}</button></div></div> 
                 
              
                  </form>
                      @endforeach
                       
            </div>
          </div>
          <div class="mr-grid actors-row">
            <div class="col1">
            
            </div>
          </div>
          <div class="mr-grid action-row">
            <div class="col2"><div class="watch-btn"><h3><i class="material-icons">&#xE037;</i>WATCH TRAILER</h3></div>
            </div>
           
          </div>
        </div>
      </div>
  </div>
</div>

       
    </body>
</html>


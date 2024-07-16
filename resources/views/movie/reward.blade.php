<?php



// GET -------------------------------------------------------------------------

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Promotions</title>
        <link rel="stylesheet" href="/css/style.css">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous"
            />
        
        <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
             
       
    </head>
    <body>
       
   <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
      <div class="container">
        <a href="#" class="navbar-brand">Timeless Cinema House</a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="#learn" class="nav-link">Movie</a>
            </li>
            <li class="nav-item">
              <a href="#questions" class="nav-link">Cart</a>
            </li>
            <li class="nav-item">
              <a href="#instructors" class="nav-link">Member</a>
            </li>
             <li class="nav-item">
              <a href="#instructors" class="nav-link">Food</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Showcase -->
    <section
      class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start"
    >
      <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between">
          <div>
            <h1>Become a <span class="text-warning"> Member </span></h1>
            <p class="lead my-4">
              Become a member and enjoy up to 50% discount.
            </p>
            <button
              class="btn btn-primary btn-lg"
              data-bs-toggle="modal"
              data-bs-target="#enroll"
            >
            Register Now
            </button>
          </div>
          <img
            class="img-fluid w-50 d-none d-sm-block"
            src="/images/member-card.png"
            alt=""
          />
        </div>
      </div>
    </section>
 
    <p class="h1" style="color: white; text-align: center; position: relative; margin-top: 20px;">Promotions</p>
    
      <div id="container-movies">  
      
@foreach($reward as $p)
          

            <div class="container-movie">
                <div class="movie">

                    <div class="movie-inside front">
                        <img src="/photos/{{$p->photo}}" height="400px" width="280px">
                    </div>

                    <div class="movie-inside back">
                        <div class="movie-details">

                            <h1>{{ $p->name }}<br><span>{{ $p->type }}</span></h1>

                            <p class="movie-synopsis">{{$p->description}}<br>
                              
                                Promo Code:<br>
                             {{ $p->code }} </p>
                            <ul class="movie-tags">
                                <li><a href="#">Book Now</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
              
             
              
  @endforeach
           

        </div>


      

  <div class="clearfix"></div>

        <div class="sub">
            <p>Looking for something else? Search!!</p>
            <input type="text" class="text1" value="">
            <button class="search">Search</button></div>
            
             <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <script>
      mapboxgl.accessToken =
        'pk.eyJ1IjoiYnRyYXZlcnN5IiwiYSI6ImNrbmh0dXF1NzBtbnMyb3MzcTBpaG10eXcifQ.h5ZyYCglnMdOLAGGiL1Auw'
      var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [-71.060982, 42.35725],
        zoom: 18
      });
    </script>
    
    
    </body>
    
    
</html>

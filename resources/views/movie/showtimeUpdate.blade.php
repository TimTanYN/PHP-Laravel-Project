<?php

?>
 <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showtime</title>
       <link rel="stylesheet" href="/css/insertCss.css">
          <link rel="stylesheet" href="/css/insertCss.css">
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
    
     <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    </head>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form method="post" enctype="multipart/form-data" action="/showtime/{{$p->showtimeId}}">
    @csrf
    @method('put')
  <div class="segment">
    <h1>Update</h1>
  </div>
  <label>
      <input type="text"  name="showtimeId" value="{{old('showtimeId',$p)}}" readonly/>
  </label>
  <label>
      <input type="text" placeholder="movieId" name="movieId" value="{{old('movieId',$p)}}" maxlength="10"/>
         
  </label>
     <label>
    <input type="text" placeholder="hallId" name="hallId" value="{{old('hallId',$p)}}"/>
  </label>
  <label>
    <input type="text" placeholder="startTime" name="startTime" value="{{old('startTime',$p)}}" maxlength="8"/>
     
  </label>
            <label>
    <input type="text" placeholder="endTime" name="endTime" value="{{old('endTime',$p)}}" maxlength="1000"/>
      
  </label>
    
             <label>
    <input type="text" placeholder="date" name="date" value="{{old('date',$p)}}"/>
  </label>
          
       
           
  <button class="red" type="submit"><i class="icon ion-md-lock"></i> Update</button>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="/js/app.js"></script>
  
  
</form>




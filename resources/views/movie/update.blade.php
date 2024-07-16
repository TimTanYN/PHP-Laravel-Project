<?php

?>
 <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reward</title>
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
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form method="post" enctype="multipart/form-data" action="/movie/{{$p->movieId}}">
    @csrf
    @method('put')
  <div class="segment">
    <h1>Update</h1>
  </div>
  <label>ID
      <input type="text"  name="id" value="{{old('movieId',$p)}}" readonly/>
  </label>
  <label>Name
      <input type="text" placeholder="Name" name="name" value="{{old('name',$p)}}" maxlength="10"/>
         <span class="err"> @error('name') {{$message}} @enderror</span>
  </label>
  <label>Description
    <input type="text" placeholder="Description" name="desc" value="{{old('desc',$p)}}" maxlength="8"/>
      <span class="err"> @error('desc') {{$message}} @enderror</span>
  </label>
            <label>Duration
    <input type="text" placeholder="Duration" name="duration" value="{{old('duration',$p)}}" maxlength="1000"/>
      <span class="err"> @error('duration') {{$message}} @enderror</span>
  </label>
    
             <label>Movie Rating
    <input type="text" placeholder="Movie Rating" name="movieRating" value="{{old('movieRating',$p)}}"/>
  </label>
           <label>Movie Tag
    <input type="text" placeholder="Movie Tag" name="tag" value="{{old('tag',$p)}}"/>
  </label>
    
        <label class="upload">Icon Photo
    <input type="file"  name="photo" accept="image/*">
  </label>
    
       <label class="upload">Background Photo
    <input type="file"  name="poster" accept="image/*">
  </label>
           
  <button class="red" type="submit"><i class="icon ion-md-lock"></i> Update</button>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="/js/app.js"></script>
  
  
</form>



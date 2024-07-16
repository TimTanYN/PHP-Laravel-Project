
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showtime</title>
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

<style>
    @import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700");
*, *:before, *:after {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 24px;
  font-family: 'Source Sans Pro', sans-serif;
  margin: 0;
}

h1, h2, h3, h4, h5, h6 {
  margin: 0;
}

.container {
  max-width: 1000px;
  margin-right: auto;
  margin-left: auto;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  position: relative;
  margin-top: 100px;
  min-height: 100vh;


}

.table {
  width: 100%;
  border: 1px solid #EEEEEE;
}

.table-header {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  background: #000;
  padding: 18px 0;
  text-align: center;
}

.table-row {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  width: 100%;
  padding: 18px 0;
}

.table-row:nth-of-type(odd) {
  background: #EEEEEE;
}

.table-data, .header__item {
  -webkit-box-flex: 1;
      -ms-flex: 1 1 20%;
          flex: 1 1 20%;
  text-align: center;
}
.table-data{
    margin-right: 30px;
}
.header__item {
  text-transform: uppercase;
}

.filter__link {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;
  padding-left: 24px;
  padding-right: 24px;
}

.filter__link::after {
  content: '';
  position: absolute;
  right: -18px;
  color: white;
  font-size: 12px;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
}

.filter__link.desc::after {
  content: '(desc)';
}

.filter__link.asc::after {
  content: '(asc)';
}
/*# sourceMappingURL=test.css.map */
</style>

<body>
    <h1>Hall</h1>
    
 <div class="container">

            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link">Seat Id</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" >Seat Number</a></div>
                     <div class="header__item"><a id="wins" class="filter__link filter__link--number" >Showtime Id</a></div>
                      <div class="header__item"><a id="wins" class="filter__link filter__link--number" >Customer Id</a></div>
                  
                     
                        
               
                </div>
                
   
     @foreach($seat as $item)
   
        <div class='table-content'>	
                    <div class='table-row'>
                        <div class='table-data'>{{ $item->seatid }}</div>
                        <div class='table-data'>{{ $item->seats}}</div>
                          <div class='table-data'>{{ $item->showtimeId}}</div>
                            <div class='table-data'>{{ $item->customer_id}}</div>
                       
                     
                    </div>
                     </div>
       
      
    
    @endforeach
                
               
       
                </div>
     </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="/js/app.js"></script>
 
  


</html>
<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


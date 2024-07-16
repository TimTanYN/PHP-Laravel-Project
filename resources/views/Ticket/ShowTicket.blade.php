<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Movie Ticket</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css">
        body {
   background: linear-gradient(rgba(30, 27, 38, 0.95), rgba(30, 27, 38, 0.95)), url("https://i.ibb.co/FDGqCmM/papers-co-ag74-interstellar-wide-space-film-movie-art-33-iphone6-wallpaper.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: repeat;
  font-family: "Yanone Kaffeesatz", sans-serif;
  font-weight: 600;
}

img {
  max-width: 100%;
  height: auto;
}

.ticket {
  width: 400px;
  height: 775px;
  background-color: white;
  margin: 25px auto;
  position: relative;
}

.holes-top {
  height: 50px;
  width: 50px;
  background-color: linear-gradient(rgba(30, 27, 38, 0.95), rgba(30, 27, 38, 0.95));
  border-radius: 50%;
  position: absolute;
  left: 50%;
  margin-left: -25px;
  top: -25px;
}
.holes-top:before, .holes-top:after {
  content: "";
  height: 50px;
  width: 50px;
  background-color: linear-gradient(rgba(30, 27, 38, 0.95), rgba(30, 27, 38, 0.95));
  position: absolute;
  border-radius: 50%;
}
.holes-top:before {
  left: -200px;
}
.holes-top:after {
  left: 200px;
}

.holes-lower {
  position: relative;
  margin: 25px;
  border: 1px dashed #aaa;
}
.holes-lower:before, .holes-lower:after {
  content: "";
  height: 50px;
  width: 50px;
  background-color: Thistle;
  position: absolute;
  border-radius: 50%;
}
.holes-lower:before {
  top: -25px;
  left: -50px;
}
.holes-lower:after {
  top: -25px;
  left: 350px;
}

.title {
  padding: 50px 25px 10px;
}

.cinema {
  color: #aaa;
  font-size: 22px;
}

.movie-title {
  font-size: 50px;
}

.info {
  padding: 15px 25px;
}

table {
  width: 100%;
  font-size: 18px;
  margin-bottom: 15px;
}
table tr {
  margin-bottom: 10px;
}
table th {
  text-align: left;
}
table th:nth-of-type(1) {
  width: 38%;
}
table th:nth-of-type(2) {
  width: 40%;
}
table th:nth-of-type(3) {
  width: 15%;
}
table td {
  width: 33%;
  font-size: 32px;
}

.bigger {
  font-size: 30px;
}

.serial {
  padding: 25px;
}
.serial table {
  border-collapse: collapse;
  margin: 0 auto;
}
.serial td {
  width: 3px;
  height: 50px;
}

.numbers td {
  font-size: 16px;
  text-align: center;
}
        </style>
    </head>
    <body>
      

<div class="ticket">
	<div class="holes-top"></div>
	<div class="title">
		<p class="cinema">TIMELESS CINEMA HOUSE</p>
		<p class="movie-title">{{$movie->name}}</p>
	</div>
	<div class="poster">
		<img src="/photos/{{$movie->poster}}" alt="Movie: Only God Forgives" width="500px"/>
	</div>
	<div class="info">
	<table>
		<tr>
			<th>SCREEN</th>
			<th>HALL</th>
			<th>SEAT</th>
		</tr>
		<tr>
			<td class="bigger">18</td>
			<td class="bigger">{{$hall->hallName}}</td>
                                 @foreach ($seats as $seat)                       
			<td class="bigger">{{ $seat }}</td>
                        @endforeach
		</tr>
	</table>
	<table>
		<tr>
			<th>PRICE</th>
			<th>DATE</th>
			<th>TIME</th>
		</tr>
		<tr>
			<td>${{$total}}</td>
			<td>{{$showtimes->date}}</td>
			<td>{{$showtimes->startTime}}</td>
		</tr>
	</table>
            <a href="/home">Home</a>
	</div>
      
	</div>


    </body></html>
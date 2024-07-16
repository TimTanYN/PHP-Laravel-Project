
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat Booking</title>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <meta name="csrf-token" content="{{ csrf_token() }}">
   
</head>

<body>
    <style>
   body
{
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
   background: linear-gradient(rgba(30, 27, 38, 0.95), rgba(30, 27, 38, 0.95)), url("https://i.ibb.co/FDGqCmM/papers-co-ag74-interstellar-wide-space-film-movie-art-33-iphone6-wallpaper.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: repeat;
  
     height: 100%;
    margin: 0;
 
}

#Username
{
  border:none;
  border-bottom:1px solid;
}

.screen
{
  width:100%;
  height:20px;
  background:#4388cc;
  color:#fff;
  line-height:20px;
  font-size:15px;
}

.smallBox::before
{
  content:".";
  width:15px;
  height:15px;
  float:left;
  margin-right:10px;
}
.greenBox::before
{
  content:"";
  background:Green;
}
.redBox::before
{
  content:"";
  background:Red;
}
.emptyBox::before
{
  content:".";
  box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

.seats
{
  border:1px solid red;background:yellow;
} 



.seatGap
{
  width:40px;
}

.seatVGap
{
  height:40px;
}

table
{
  text-align:center;
}


.Displaytable
{
  text-align:center;
}
.Displaytable td, .Displaytable th {
    border: 1px solid;
    text-align: left;
}

textarea
{
  border:none;
  background:transparent;
}



input[type=checkbox] {
    width:0px;
    margin-right:18px;
}

input[type=checkbox]:before {
    content: "";
    width: 15px;
    height: 15px;
    display: inline-block;
    vertical-align:middle;
    text-align: center;
    box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
    background-color:#ccc;
}

input[type=checkbox]:checked:before {
    background-color:Green;
    font-size: 15px;
}

input[type=checkbox]:disabled {
    background-color:red;
}
.disabledBox{
   background-color:red;
}

.seatStructure{
      display: grid;
    align-items: center; /* Centers vertically */
    justify-items: center; /* Centers horizontally */
    height: 100%;
}


::-webkit-scrollbar {
  width: 10px;
}

::-webkit-scrollbar-track {
  background: #194058; 
}

::-webkit-scrollbar-thumb {
  background:#f1b722; 
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: #555; 
}

    </style>
    
<body>

<div class="inputForm">
<center>

 <input type="hidden" id="Numseats" value="{{$Quantity}}" required>
  <br/><br/>

</center>
</div>
  

<div class="seatStructure">
<center>
  
<table id="seatsBlock">
 <p id="notification"></p>
  <tr>
    <td colspan="14"><div class="screen">SCREEN</div></td>
    <td rowspan="20">
      <div class="smallBox greenBox">Selected Seat</div> <br/>
      <div class="smallBox redBox">Reserved Seat</div><br/>
      <div class="smallBox emptyBox">Empty Seat</div><br/>
    </td>
    
    <br/>
  </tr>
  
  <tr>
    <td></td>
    <td>1</td>
    <td>2</td>
    <td>3</td>
    <td>4</td>
    <td>5</td>
    <td></td>
    <td>6</td>
    <td>7</td>
    <td>8</td>
    <td>9</td>
    <td>10</td>
    <td>11</td>
    <td>12</td>
</tr>
  


<tr>
    <td>A</td>
    @for ($i = 1; $i <= 5; $i++)
    <td>
        <input type="checkbox" value="A{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
      <td class="seatGap"></td>
      
       @for ($i = 6; $i <= 12; $i++)
    <td>
        <input type="checkbox" value="A{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
</tr>
<tr>
     <td>B</td>
     @for ($i = 1; $i <= 5; $i++)
    <td>
        <input type="checkbox" value="B{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
      <td class="seatGap"></td>
      
       @for ($i = 6; $i <= 12; $i++)
    <td>
        <input type="checkbox" value="B{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
</tr>

<tr>
     <td>C</td>
     @for ($i = 1; $i <= 5; $i++)
    <td>
        <input type="checkbox" value="C{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
      <td class="seatGap"></td>
      
       @for ($i = 6; $i <= 12; $i++)
    <td>
        <input type="checkbox" value="C{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
</tr>

<tr>
     <td>D</td>
     @for ($i = 1; $i <= 5; $i++)
    <td>
        <input type="checkbox" value="D{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
      <td class="seatGap"></td>
      
       @for ($i = 6; $i <= 12; $i++)
    <td>
        <input type="checkbox" value="D{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
</tr>

<tr>
     <td>E</td>
     @for ($i = 1; $i <= 5; $i++)
    <td>
        <input type="checkbox" value="E{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
      <td class="seatGap"></td>
      
       @for ($i = 6; $i <= 12; $i++)
    <td>
        <input type="checkbox" value="E{{ $i }}" {{ $seats->contains(function ($seat) use ($i) { return $seat->seats === "A{$i}"; }) ? 'disabled' : '' }}>
    </td>
@endfor
</tr>

   
  

</table>

<br/><button onclick="updateTextArea()">Confirm Selection</button>
</center>
</div>
      
<br/><br/>
<div class="displayerBoxes">
<center>
  <table class="Displaytable">
  <tr>
    <th>Number of Seats</th>
    <th>Seats</th>
  </tr>
  <tr>
 
  
  <form action="/movie/seat" method="post">
      @csrf
      <td><textarea id="NumberDisplay"></textarea></td> 
   <td><textarea id="seatsDisplay" name="seats"></textarea></td>   

          
   </table>
     <br/> <button type="submit" class="buttons">Continue</button>
       </form>
</center>
</div>

 
    


    <script>





function updateTextArea() { 
    
  
      $(".seatStructure *").prop("disabled", true);
      
     var allNameVals = [];
     var allNumberVals = [];
     var allSeatsVals = [];
  
     //Storing in Array
     allNameVals.push($("#Username").val());
     allNumberVals.push($("#Numseats").val());
     $('#seatsBlock :checked').each(function() {
       allSeatsVals.push($(this).val());
     });
    
     //Displaying 
     $('#nameDisplay').val(allNameVals);
     $('#NumberDisplay').val(allNumberVals);
     $('#seatsDisplay').val(allSeatsVals);
    
        }
  
  
   

</script>





</script>
</body>
</html>
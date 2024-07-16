
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
     

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
  max-width: 1300px;
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
    margin-right: 20px;
}
.header__item {
  text-transform: uppercase;
}

.filter__link {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;

  padding-right: 54px;
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
    <h1>Movie</h1>
     <button data-get="/movies/create">Create</button>
 <div class="container">

            <div class="table">
                <div class="table-header">
                    <div class="header__item"><a id="name" class="filter__link filter__link--number">Id</a></div>
                    <div class="header__item"><a id="wins" class="filter__link filter__link--number" >Name</a></div>
                    <div class="header__item"><a id="draws" class="filter__link filter__link--number" >Desc</a></div>
                    <div class="header__item"><a id="losses" class="filter__link filter__link--number" >Duration</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" >Movie Rating</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" >Tag</a></div>
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" >Photo</a></div>
                   
                    <div class="header__item"><a id="total" class="filter__link filter__link--number" >Poster</a></div>
                      <div class="header__item"><a id="total" class="filter__link filter__link--number" >Action</a></div>
                        
               
                </div>
                
   
    @foreach($movie as $p)
   
        <div class='table-content'>	
                    <div class='table-row'>
                        <div class='table-data'>{{ $p->movieId }}</div>
                        <div class='table-data'>{{ $p->name }}</div>
                        <div class='table-data'>{{ $p->desc }}</div>
                        <div class='table-data'>{{ $p->duration }}</div>
                         <div class='table-data'>{{ $p->movieRating}}</div>
                          <div class='table-data'>{{ $p->tag}}</div>
                        <div class='table-data'>{{ $p->photo}}</div>
                         <div class='table-data'>{{ $p->poster}}</div>
                         <form>
                       <button data-get='/movie/{{ $p->movieId }}/edit'>Update</button>
                         </form>
                           <form method="post" action="/movieDelete/{{$p->movieId}}">
                @csrf
                @method('delete')
                 <button>Delete</button>
            </form>
                    </div>
                     </div>
       
      
    
    @endforeach
                
               
       
                </div>
     </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="/js/app.js"></script>
 
  


</html>

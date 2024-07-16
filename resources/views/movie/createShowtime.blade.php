
<html>
   
    <head>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie</title>
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
    <body>
     
  <div class="segment">
    <h1>Showtime</h1>
  </div>
        <form action="/showtime/createNew" method="post">
   @csrf      
  <label>
      <input type="text" placeholder="Movie" name="movieId"/>
  </label>
  <label>
    <input type="text" placeholder="Hall" name="hallId"/>
  </label>
            <label>
    <input type="text" placeholder="hh:mm" name="startTime"/>
  </label>
           <label>
    <input type="text" placeholder="hh:mm" name="endTime"/>
  </label>
           <label>
    <input type="text" placeholder="dd/mm/yyyy" name="date"/>
  </label>
          
  
  <button class="red" type="submit" id="apiButton"><i class="icon ion-md-lock"></i> Create</button>
  </form>
<!--  <script>
        document.getElementById('apiButton').addEventListener('click', function() {
            // Call the API when the button is clicked
            callAPI();
        });

        function callAPI() {
            // Replace with your actual API URL
            var apiUrl = 'http://127.0.0.1:8001/api/addShowtime';

            // Replace with your actual data to be sent as the request body
            var requestData = {
                movieId: document.getElementById('movieId').value,
                hallId: document.getElementById('hallId').value,
                startTime: document.getElementById('startTime').value,
                endTime: document.getElementById('endTime').value,
                date: document.getElementById('date').value
            };

            fetch(apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    // If you need to send an API token or other headers, add them here
                    // 'Authorization': 'Bearer ' + apiToken
                },
                body: JSON.stringify(requestData)
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                console.log(data);

                // Process the data as needed
                // For example, update the DOM to display the data
            })
            .catch(function(error) {
                console.error('Error fetching API:', error);
            });
        }
    </script>
  -->
  

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="/js/app.js"></script>
    </body>
</html>



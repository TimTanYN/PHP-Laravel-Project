<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Seat;
use App\Models\Showtime;
use Illuminate\Http\Request;
use SimpleXMLElement;
use DOMDocument;
use XSLTProcessor;
use app\Factories\TicketFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Collections\MovieCollection;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class MovieController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"  ?><movies></movies>');

        $movies = Movie::all();
        // In the PostController's xml() method, before creating the XML structure
        $csrfToken = csrf_token();

// After creating the XML structure and before looping through the posts
        $xml->addChild('csrf_token', htmlspecialchars($csrfToken));

        foreach ($movies as $movie) {
            $movieElement = $xml->addChild('movie');
            $movieElement->addAttribute('movieId', $movie->movieId);
            $movieElement->addChild('name', $movie->name);
            $movieElement->addChild('duration', $movie->duration);
            $movieElement->addChild('desc', $movie->desc);
            $movieElement->addChild('photo', $movie->photo);
             $movieElement->addChild('poster', $movie->poster);
              $movieElement->addChild('movieRating', $movie->movieRating);
               $movieElement->addChild('tag', $movie->tag);
        }



// Return the XML content with the processing instruction included
        $xslFile = File::get(resource_path('views\movie\movie.xsl'));
        $xsl = new DOMDocument();
        $xsl->loadXML($xslFile);

        // Transform the XML using the XSLT
        $processor = new XSLTProcessor();
        $processor->importStylesheet($xsl);

        $xmlDoc = new DOMDocument();
        $xmlDoc->loadXML($xml->asXML());
        $transformedXml = $processor->transformToXML($xmlDoc);

        // Return the transformed XML response
        return response($transformedXml, 200, ['Content-Type' => 'text/html']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showBackend() {
        $movie = Movie::all();
        return view('movie.movieView', ['movie' => $movie]);
    }
    
    public function deletePhoto($name){
          if ($name != '0.jpg') {
           File::delete(public_path("/photos/$name"));
    }
    }
    

    public function create() {
        return view('movie.create');
    }

    private function savePhoto($file) {
        $name = Str::ulid() . '.jpg';

        Image::make($file)->fit(200, 200)->save(public_path("/photos/$name"));

        return $name;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req) {
       try{
            $req->validate([
            'name' => 'required|min:3|max:100',
            'duration' => 'required|numeric',
            'desc' => 'required|min:3',
            'photo' => 'image',
           'poster' => 'image',
            'movieRating' => 'required|min:3|max:100',
            'tag' => 'required|min:3|max:100'
        ]);

        $p = new Movie();
        $p->name = $req->name;
        $p->duration = $req->duration;
        $p->desc = $req->desc;
        $p->photo = $this->savePhoto($req->photo);
        $p->poster = $this->savePhoto($req->poster);
        $p->movieRating = $req->movieRating;
        $p->tag = $req->tag;
        $p->save();

        return redirect('/movie')->with('info', 'Movie inserted');
       } catch (ValidationException $e) {
           Log::error('Validation error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
       }catch(TokenMismatchException $e){
        Log::error('Token error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie) {
        return view('movie.update', ['p' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, Movie $movie) {
        try{
              $req->validate([
            'name' => 'required|min:3|max:100',
            'duration' => 'required|numeric',
            'desc' => 'required|min:3|max:100',
            'photo' => 'image'
        ]);

        $p = $movie;
        $p->name = $req->name;
        $p->duration = $req->duration;
        $p->desc = $req->desc;
         $p->movieRating = $req->movieRating;
        $p->tag = $req->tag;

        if($req->photo){
            $this->deletePhoto($p->photo);
            $p->photo = $this->savePhoto($req->photo);
        }
        
          if($req->poster){
            $this->deletePhoto($p->poster);
            $p->poster = $this->savePhoto($req->poster);
        }

        $p->save();

        $movie = Movie::all();
        return view('movie.movieView', ['movie' => $movie]);
        } catch (ValidationException $e) {
        Log::error('Validation error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
        }catch(TokenMismatchException $e){
        Log::error('Token error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
        }
       
                
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie) {
           $p = $movie;
        $this->deletePhoto($p->photo);
          $this->deletePhoto($p->poster);
        $p->delete();
        return view('movie.movieView')->with('info','Reward deleted');
    }

    public function search(Request $request) {
        $movieCollection = new MovieCollection();
        $searched =  $request->input('search');

        foreach ($movieCollection as $movie) {
            if ($movie->name === $searched) {
               $showtimes = Showtime::where('movieId', $movie->movieId)->get();
                 $movie = Movie::find( $movie->movieId);
                   return view('movie.dateChoosing', ['showtime' => $showtimes , 'movie' => $movie]);
              
            }
        }
        
        
    }

    public function ticket(Request $request) {
        try{
            $request->validate([
            'regular_tickets' => 'numeric|min:0',
            'premium_tickets' => 'numeric|min:0'
           
        ]);
        $regularQuantity = $request->input('regular_tickets');
        $premiumQuantity = $request->input('premium_tickets');
         session(['regular' => $regularQuantity]);
         session(['premium' => $premiumQuantity]);
        $totalQuantity = $regularQuantity + $premiumQuantity;
        $userBookedTickets = [];

        if ($regularQuantity > 0) {
            $userBookedTickets[] = ['type' => 'regular', 'quantity' => $regularQuantity];
        }

        if ($premiumQuantity > 0) {
            $userBookedTickets[] = ['type' => 'premium', 'quantity' => $premiumQuantity];
        }
        $totalPrice = 0;

        foreach ($userBookedTickets as $bookedTicket) {
            $ticketType = $bookedTicket['type'];
            $quantity = $bookedTicket['quantity'];
            $ticket = \App\Factories\TicketFactory::create($ticketType);
            $totalPrice += $ticket->getTotalPrice($quantity);
        }
        
        session(['totalPrice' => $totalPrice]);
         session(['totalQuantity' => $totalQuantity]);
         $showtimeId = $request->session()->get('showtimeId');
    
    // Query the seats using the showtimeId
    $seats = Seat::where('showtimeId', $showtimeId)->get();
        return view('movie.seatChoosing',['seats'=> $seats])->with('Quantity', $totalQuantity);
        } catch (ValidationException $e) {
        Log::error('Validation error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
        }catch(TokenMismatchException $e){
        Log::error('Token error: ' . $e->getMessage());
        return redirect()->back()->withErrors($e->errors());
        }
          
        
    }

    public function home() {
        return view('movie.home');
    }

    public function handleSelected(Request $request) {
        $selectedid = $request->input('selected_id');
        $showtimes = Showtime::where('movieId', $selectedid)->get();
        foreach ($showtimes as $s){
            session()->put('showtimeId', $s->showtimeId);
        }
         
        $movie = Movie::find($selectedid);
       $showtimeData = Showtime::join('movies', 'showtimes.movieId', '=', 'movies.movieId')
                ->select('showtimes.*', 'movies.name')
                ->get(); // Use first() instead of get() to get the first record only
    
          
        return view('movie.dateChoosing', ['showtime' => $showtimes , 'movie' => $movie]);
       
    }

    function hall(Request $request) {
        $showtimeId = $request->input('showtimeId');
        return view('movie.quantityChoosing');
    }
    
    function seatStore(Request $request){
     return view('movie.home');
    }
    
    public function seat(Request $request) {
     $showtimeId = $request->session()->get('showtimeId');
     // Get the textarea value
    $seatsStr = $request->input('seats');

    // Split the string into an array of seat values
    $seatsArray = explode(',', $seatsStr);
    session(['seats' => $seatsArray]);
    $length = count($seatsArray);
    $number = session()->get('totalQuantity');
    if($number != $length){
          return view('movie.quantityChoosing')->with('success', 'Success');
    }
    $customerId = session()->get('customerId');
    // Save each seat in the database
    foreach ($seatsArray as $seatValue) {
        $seat = new Seat();
        $seat->seats = trim($seatValue);
         $seat->showtimeId = trim($showtimeId);
          $seat->customer_id = trim($customerId);
        $seat->save();
        
    }

    // Redirect or return a response (e.g., a view)
   return redirect()->route('order.orderFrontend');
    }
    
    
    function showtime(Request $request){
         $movieId = $request->input('movieId');
         $date = $request->input('date');
          $showtimes = Showtime::where('movieId', $movieId)->where('date', $date)->get();
          $movie = Movie::find($movieId);
          
              session()->put('movieId', $movieId);
          
          foreach($showtimes as $s){
              session()->put('showtime', $s->showtimeId);
          }
              return view('movie.showtimeChoosing', ['showtime' => $showtimes , 'movie' => $movie]);
         
         
    }
    
   
    
    
    
 

}

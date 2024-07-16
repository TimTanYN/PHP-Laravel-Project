<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShowtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    public function index()
//    {
//          $client = new Client();
//        $response = $client->get('http://127.0.0.1:8001/api/showtimeShow');
//           if ($response->getStatusCode() == 200) {
//                // Parse the JSON response
//                $data = json_decode($response->getBody(), true);
//                
//
////               print_r($data);
//               return view('movie.showtime', ['data' => $data]);
//            } else {
//                echo 'fail';
//            }
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//         return view('movie.createShowtime');
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    
//    public function edit(Showtime $showtime)
//    {
//        return view('movie.showtimeUpdate', ['p' => $showtime]);
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Request $req)
//    {
//         $client = new Client();
//         $showtimeId = $req->input('showtimeId');
//
//    // Replace with your actual API URL
//    $apiUrl = 'http://127.0.0.1:8001/api/updateShowtime/'. $showtimeId;
//
//    // Replace with your actual data to be sent as the request body
//    $requestData = [
//         'movieId' => $req->input('movieId'),
//         'hallId' => $req->input('hallId'),
//         'startTime' => $req->input('startTime'),
//         'endTime' => $req->input('endTime'),
//         'date' => $req->input('date')
//    ];
//    
//    try {
//        // Send a PUT request to the API endpoint
//        $response = $client->put($apiUrl, [
//            'headers' => [
//                'Content-Type' => 'application/json',
//                // If you need to send an API token or other headers, add them here
//                // 'Authorization' => 'Bearer ' . $apiToken
//            ],
//            'body' => json_encode($requestData)
//        ]);
// session()->flash('success', 'Success');
//    $response = $client->get('http://127.0.0.1:8001/api/showtimeShow');
//           if ($response->getStatusCode() == 200) {
//                // Parse the JSON response
//                $data = json_decode($response->getBody(), true);
//                
//
////               print_r($data);
//               return view('movie.showtime', ['data' => $data])->with('success', 'Success');
//            } else {
//                echo 'fail';
//            }
//        // Check if the request was successful
//      
//    } catch (\Exception $e) {
//        // Handle exceptions
//        echo "Error: " . $e->getMessage();
//    }
//}
//    
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Showtime $showtime)
//    {
//        
//        // Create a new Guzzle client
//    $client = new Client();
//
//    // Replace with your actual API URL
//    $apiUrl = "http://127.0.0.1:8001/api/deleteShowtime/". $showtime->showtimeId;
//
//    try {
//        // Send a DELETE request to the API endpoint
//        $response = $client->delete($apiUrl, [
//            'headers' => [
//                // If you need to send an API token or other headers, add them here
//                // 'Authorization' => 'Bearer ' . $apiToken
//            ]
//        ]);
//        
//         session()->flash('success', 'Success');
//    $response = $client->get('http://127.0.0.1:8001/api/showtimeShow');
//           if ($response->getStatusCode() == 200) {
//                // Parse the JSON response
//                $data = json_decode($response->getBody(), true);
//                
//
////               print_r($data);
//               return view('movie.showtime', ['data' => $data])->with('success', 'Success');;
//            } else {
//                echo 'fail';
//            }
//
//      
//    } catch (\Exception $e) {
//        // Handle exceptions
//        echo "Error: " . $e->getMessage();
//    }
//
//    }
//    
//    
//     function showtimeCreateNew(Request $req){
//       $client = new Client();
//
//    // Replace with your actual API URL
//    $apiUrl = 'http://127.0.0.1:8001/api/addShowtime';
//
//    // Replace with your actual data to be sent as the request body
//    $requestData = [
//         'movieId' => $req->input('movieId'),
//         'hallId' => $req->input('hallId'),
//         'startTime' => $req->input('startTime'),
//         'endTime' => $req->input('endTime'),
//         'date' => $req->input('date')
//    ];
//
//    try {
//        // Send a POST request to the API endpoint
//        $response = $client->post($apiUrl, [
//            'headers' => [
//                'Content-Type' => 'application/json',
//                // If you need to send an API token or other headers, add them here
//                // 'Authorization' => 'Bearer ' . $apiToken
//            ],
//            'body' => json_encode($requestData)
//        ]);
//         session()->flash('success', 'Success');
//    $response = $client->get('http://127.0.0.1:8001/api/showtimeShow');
//           if ($response->getStatusCode() == 200) {
//                // Parse the JSON response
//                $data = json_decode($response->getBody(), true);
//                
//
////               print_r($data);
//               return view('movie.showtime', ['data' => $data])->with('success', 'Success');
//            } else {
//                echo 'fail';
//            }
//        // Check if the request was successful
//       
//    } catch (\Exception $e) {
//        // Handle exceptions
//        echo "Error: " . $e->getMessage();
//    }
//    }
     public function showtimeBackend(){
        return response()->json(Showtime::all(),200);
    }
    
  
    
    public function showtimeAdd(Request $req){
        $showtime = Showtime::create($req->all());
        return response($showtime,201);
//        echo 'success';
    }
    
    function showtimeCreate(){
        return view('movie.createShowtime');
    }
    
    function showtimeUpdate(Request $req,$showtimeId){
       $showtime = Showtime::find($showtimeId);
    $showtime->update($req->all());
    return response($showtime, 200);
    }
    
    function showtimeDelete(Request $req,$showtimeId){
        $showtime = Showtime::find($showtimeId);
        $showtime->delete();
        return response()->json(null,204);
    }
    
    
}

<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Movie;
use App\Models\Hall;
use App\Models\Showtime;
use App\Models\Seat;
use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Services\Payment\CreditCardPayment;
use App\Services\Payment\PaypalPayment;
use App\Services\Payment\PaymentContext;
// use XSLTProcessor;
use SimpleXMLElement;
use DOMDocument;
use Illuminate\Support\Facades\File;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //remember to close the "<?xml"
        // $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"  <orders></orders>');

//         $orders = Order::all();
//         // In the PostController's xml() method, before creating the XML structure
//         $csrfToken = csrf_token(); -->

// // After creating the XML structure and before looping through the posts
//         $xml->addChild('csrf_token', htmlspecialchars($csrfToken));

//         foreach ($orders as $order) {
//             $orderElement = $xml->addChild('order');
//             $orderElement->addAttribute('order_id', $order->order_id);
//             $orderElement->addChild('customer_id', $order->customer_id);
//             $orderElement->addChild('created_at', $order->created_at);
//             $orderElement->addChild('updated_at', $order->updated_at);
//             $orderElement->addChild('total', $order->total);
//              $orderElement->addChild('paymentMethod', $order->paymentMethod);
         
//         }

//         // Return the XML content with the processing instruction included
//         $xslFile = File::get(resource_path('views\order\orderList.xsl'));
//         $xsl = new DOMDocument();
//         $xsl->loadXML($xslFile);

//         // Transform the XML using the XSLT
//         $processor = new \XSLTProcessor();
//         $processor->importStylesheet($xsl);

//         $xmlDoc = new \DOMDocument();
//         $xmlDoc->loadXML($xml->asXML());
//         $transformedXml = $processor->transformToXML($xmlDoc);

//         // Return the transformed XML response
//         return response($transformedXml, 200, ['Content-Type' => 'text/html']);
        return view('order.index');
    }

    public function getAllOrder(){
        $customer = Customer::all();
        $order = Order::all();
        return view('order.orderList')->with('order', $order)->with('customer',$customer);
    }

    public function sort(){
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customer = Customer::all();
         return view('order.create')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Order::create($input);
        return redirect('order/index')->with('flash_message', 'Order Addedd!');  

        // $data = new Order([
        //     order_id         => $request->get('order_id'),
        //     customer_id      => $request->get('customer_id'),
        //     created_at       => $request->get('created_at'),
        //     updated_at       => $request->get('updated_at'),
        //     total            => $request->get('total'),
        //     paymentMethod    => $request->get('paymentMethod'),
        //     status           => $request->get('status')
        // ]);
        // $data->save();
        // return redirect('order')->with('flash_message', 'Order Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::find($id);
        return view('order.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->customer_id = $request->input('customer_id');
        $order->total = $request->input('total');
        $order->paymentMethod = $request->input('paymentMethod');
        $order->update();
        return redirect('order/index')->with('flash_message', 'Order Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        Order::destroy($id);
        return redirect('order')->with('flash_message', 'Order deleted!'); 
    }
    
    public function processOrder(Request $request)
    {
       
        // ... other order processing logic
        $customer = $request->input('customerId');
        $paymentMethod = $request->input('paymentMethod');
        $amount = $request->input('total');
            
        $paymentContext = new PaymentContext();
//         Choose the payment strategy based on the chosen payment method
        switch ($paymentMethod) {
            case 'credit card':
                $paymentContext->setPaymentStrategy(new CreditCardPayment());
                echo $customer;
//                $input = $request->all();
//                Order::create($input);
                $order = new Order();
                $order->customer_id = $customer;
                $order->total = $amount;
                $order->paymentMethod = $paymentMethod;
                $order->save();
                break;
            case 'paypal':
                $paymentContext->setPaymentStrategy(new PaypalPayment());
//                $input = $request->all();
//                Order::create($input);
                $order = new Order();
                $order->customer_id = $customer;
                $order->total = $amount;
                $order->paymentMethod = $paymentMethod;
                $order->save();
                break;
            default:
                // Handle invalid payment method
                return response('Invalid payment method', 400);
                
        }
    
        // Process the payment
        $paymentResult = $paymentContext->executePayment($amount);
         
           $movieId = session()->get('movieId');
           $total = session()->get('totals');
           $showtimeId = session()->get('showtime');
           $movie = Movie::find($movieId);
           $showtimes = Showtime::find($showtimeId);
          $seatsArray = session('seats');
          
               $hall = $showtimes->hallId;
           
           $halls = Hall::find($hall);
        if ($paymentResult) {
           $ticket = new Ticket();
           $ticket->show_id = $showtimeId;
           $ticket->hall_id=$hall;
           $ticket->save();
          return view('ticket.ShowTicket',['movie'=>$movie,'showtimes'=>$showtimes,'seats'=>$seatsArray,'hall'=>$halls,'total'=>$total]);
        } else {
            // Handle payment failure
            return ('Payment was failed to make');
        }
        
//        return view('ticket.Ticket.showTicket');
    }

    public function getOrderList(){

        $order = Order::all();
        return response()->json(Order::all(), 200);

    }

    public function getOrderById($id){

        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(['message'=>'Order Not Found',404]);
        }
        return response()->json($order::find($id),200 );

    }

    public function addOrder(Request $request){

        $order = Order::create($request->all());
        return response($order,201);

    }

    public function updateOrder(Request $request, $id){

        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(['message'=>'Order Not Found',404]);
        }

        $order->update($request->all());
        return response($order, 200);
    }

    public function deleteOrder(Request $request, $id){

        $order = Order::find($id);
        if(is_null($order)){
            return response()->json(['message'=>'Order Not Found',404]);
        }
        $order->delete();
        return response()->json(null,204);

    }

    public function calculateTotalPrice(){
        $customerId = session()->get('customerId');
        $ticketPrice = session()->get('totalPrice');
        $regular =  session()->get('regular');
        $premium =  session()->get('premium');
        $premium = $premium*15;
        $regular = $regular*10;
        $foodPrice = session()->get('foodPrice');
        // initialize the total price to 0
        $totalPrice = 0;
        $totalPrice = $foodPrice + $ticketPrice;
//        echo $totalPrice;
        $food_ids = session('foods');

        $foods = Food::findMany($food_ids);
         $customer =  Customer::where('customer_id',$customerId)->get();
//        foreach($foods as $f){
//            echo $f;
//        }
          session(['Price' => $totalPrice]);
        return view('order.orderFrontend', ['totalPrice' => $totalPrice, 'foods' => $foods, 'premium' => $premium,'regular' => $regular, 'customer'=>$customer]);


    }

    public function frontend(){
        return view('order.orderFrontend');
    }
}

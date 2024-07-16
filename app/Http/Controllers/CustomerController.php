<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();
        return view('customer.customerList')->with('customer', $customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('customer.customerCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $xml = new DomDocument('1.0');
        // $customerListing = $xml -> createElement("customerListing");
        // $xml->appendChild($customerListing);

        // $customer = $xml -> createElement("customer");
        // $customer->setAttribute('id',1);

        // $email = $xml->createElement('email','test1@gmail.com');
        // $customer -> appendChile($email);

        // $password = $xml->createElement('password','password1');
        // $customer -> appendChile($password);

        // $name = $xml->createElement('name','Test1');
        // $customer -> appendChile($name);

        // $phone = $xml->createElement('phone','012-3456789');
        // $customer -> appendChile($phone);

        // $customerListing->appendChild($customer);

        // $xml->save('customerList.xml') or die('Error occur, unable to create the file');
        $customer = new Customer();
        $customer->email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $customer->password = $password;
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
//        $customer->created_at = "0000-00-00 00:00:00";
//        $customer->updated_at = "0000-00-00 00:00:00";
        $customer->save();
        return redirect('customer')->with('success', 'Customer Addedd!');  
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $customer = Customer::find($id);
        return view('customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customer.customerEdit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
             $customer = Customer::find($id);
        $customer->email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $customer->password = $password;
        $customer->name = $request->input('name');
        $customer->phone = $request->input('phone');
        $customer->update();
        // $input = $request->all();
        // $customer->update($input);
        return redirect('customer/customerList')->with('flash_message', 'Customer Updated!'); 
            
        } catch(ValidationException $e){
            Log::error('Validation error: ' . $e->getMessage());
            return redirect()->back()->withErrors($e->errors());
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        Customer::destroy($id);
        return redirect('customer')->with('flash_message', 'Customer deleted!'); 
    }

    public function getCustomerList(){

        return response()->json(Customer::all(), 200);

    }

    public function getCustomerById($id){

        $customer = Customer::find($id);
        if(is_null($customer)){
            return response()->json(['message'=>'Customer Not Found',404]);
        }
        return response()->json($customer::find($id),200 );

    }

    public function addCustomer(Request $request){

        $customer = Customer::create($request->all());
        return response($customer,201);

    }

    public function updateCustomer(Request $request, $id){

        $customer = Customer::find($id);
        if(is_null($customer)){
            return response()->json(['message'=>'Customer Not Found',404]);
        }

        $customer->update($request->all());
        return response($customer, 200);
    }

    public function deleteCustomer(Request $request, $id){

        $customer = Customer::find($id);
        if(is_null($customer)){
            return response()->json(['message'=>'Customer Not Found',404]);
        }
        $customer->delete();
        return response()->json(null,204);

    }



}

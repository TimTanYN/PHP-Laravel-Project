<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use GuzzleHttp\Client;

class StaffController extends Controller
{
    public function index()
    {
         $client = new Client();
       $response = $client->get('http://127.0.0.1:8001/api/staffList');
          if ($response->getStatusCode() == 200) {
                // Parse the JSON response
               $data = json_decode($response->getBody(), true);
                

               return view('staff.index', ['data' => $data]);
           } else {
                echo 'fail';
           }
    }

    // GET /products/create
    public function create()
    {
        return view('staff.create');
    }

    // POST /staffs
    public function store(Request $req)
    {
         try{
             $req->validate([
            'password' => 'required|min:8|max:16|regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/',
            //must contain at least one lowercase letter , one uppercase letter , one digit
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|max:30',
            'phonenumber' => 'required|max:14',
            'position' => 'required|max:10',
            'gender' => 'required|max:2',
        ]);
        
        $s = new Staff();
        $s->password = bcrypt($req->password);  
        $s->first_name   = $req->firstname;
        $s->last_name    = $req->lastname;
        $s->email        = $req->email;
        $s->phone_number = $req->phonenumber;
        $s->position     = $req->position;
        $s->gender       = $req->gender;
        $s->save();
        
        return redirect('/staff')->with('info', 'Staff created');
         }
        catch (ValidationException $valid) {
            Log::error('Validation Error : ', $valid->getMessage());
            return redirect()->back()->withErrors($valid->errors());
        } catch(TokenMismatchException $valid){
        Log::error('Token error: ' . $valid->getMessage());
        return redirect()->back()->withErrors($valid->errors());
        }

    }

    // GET /staff/{id}
    public function show(Staff $staff)
    {
        return view('staff.show', ['s' => $staff]);
    }

    // GET /products/{id}/edit
    public function edit(Staff $staff)
    {
        return view('staff.edit', ['s' => $staff]);
    }

    // PUT /products/{id}
    public function update(Request $req, Staff $staff)
    {
         $req->validate([
            'password' => 'required|min:8|max:16|regex:/^.*(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/', 
            //must contain at least one lowercase letter , one uppercase letter , one digit
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'email' => 'required|max:30',
            'phonenumber' => 'required|max:14',
            'position' => 'required|max:10',
            'gender' => 'required|max:2'
        ]);
        
        $s = $staff;
        $s->password = bcrypt($req->password);
        $s->first_name   = $req->firstname;
        $s->last_name    = $req->lastname;
        $s->email        = $req->email;
        $s->phone_number = $req->phonenumber;
        $s->position     = $req->position;
        $s->gender       = $req->gender;

        $s->save();
        
        return redirect('/staff')->with('info', 'Staff updated.');
    }

    public function destroy(Staff $staff)
    {
        $s = $staff;
        $s->delete();
        return redirect('/staff')->with('info', 'Staff deleted.');
    }
    
    public function getStaffList() 
    {
        $staff = Staff::all();
        return response()->json(Staff::all(), 200);
    }
    
    
}

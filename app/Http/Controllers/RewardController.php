<?php

namespace App\Http\Controllers;


use App\Models\Reward;
use App\Models\Customer;
use App\Models\Food;
use Illuminate\Http\Request;
use app\Reward\RewardFactory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RewardController extends Controller
{
    public function index()
    {
        $reward = Reward::all();
        return view('reward.index', ['reward' => $reward]);
    }
    
    public function create()
    {
        return view('reward.create');
    }
    
     public function deletePhoto($name){
          if ($name != '0.jpg') {
           File::delete(public_path("/photos/$name"));
    }
    }

    private function savePhoto($file) {
        $name = Str::ulid() . '.jpg';

        Image::make($file)->fit(200, 200)->save(public_path("/photos/$name"));

        return $name;
    }
    
    // POST /rewards
    public function store(Request $req)
    {
        $req->validate([
            'code' => 'required|max:30|regex:/^.*(?=.*[A-Z]).*$/',
            'name' => 'required|max:15',
            'type' => 'required|max:12',
            'desc' => 'required|max:100',
            'disc' => 'required|max:3',
             'photo' => 'image'
        ]);
        
        $r = new Reward();
        $r->code        = $req->code;  
        $r->name        = $req->name;
        $r->type        = $req->type;
        $r->description = $req->desc;
        $r->discount    = $req->disc;
        $r->photo    = $this->savePhoto($req->photo);
        
        $r->save();
        
        return redirect('/reward')->with('info', 'Reward Created');
    }
    
    public function destroy(Reward $reward)
    {
        $r = $reward;
        $r->delete();
        return redirect('/reward')->with('info', 'Reward deleted.');
    }
    
    public function show(Reward $reward)
    {
        return view('reward.show', ['r' => $reward]);
    }
    
    public function update(Request $req, Reward $reward)
    {
        echo'hi';
        $req->validate([
            'code' => 'required|max:30|regex:/^.*(?=.*[A-Z]).*$/',
            'name' => 'required|max:15',
            'type' => 'required|max:12',
            'desc' => 'required|max:100',
            'discount' => 'required|max:3',
        ]);
        
        $r = $reward;
        $r->code         = $req->code;
        $r->name         = $req->name;
        $r->type         = $req->type;
        $r->description  = $req->desc;
        $r->discount     = $req->discount;
        if($req->photo){
            $this->deletePhoto($p->photo);
            $p->photo = $this->savePhoto($req->photo);
        }
        $r->save();
        
        
        
        return redirect('/reward')->with('info', 'Reward updated.');
    }
    
    public function edit(Reward $reward)
    {
        return view('reward.edit', ['r' => $reward]);
    }
    
    public function giveReward(Request $req)
    { 
        $customerId = session()->get('customerId');
           $customer =  Customer::where('customer_id',$customerId)->get();
         $value = 0;
        //get input from user
        $selectedCode = $req->input('ticketcode');
      $regular =  session()->get('regular');
        $premium =  session()->get('premium');
        $premium = $premium*15;
        $regular = $regular*10;
        $type = Reward::where('code', $selectedCode)->get();
         $food_ids = session('foods');

        $foods = Food::findMany($food_ids);
        foreach ($type as $t){

             $rewardFactory = new \App\Reward\RewardFactory();
        $reward = $rewardFactory->createReward($t->type, $t->discount);
        $totalPrice = $reward->getTotalPrice();
        }
         session()->put('totals', $totalPrice);
        
        
//        foreach($foods as $f){
//            echo $f;
//        }
        return view('order.order', ['totalPrice' => $totalPrice, 'foods' => $foods, 'premium' => $premium,'regular' => $regular, 'customer'=>$customer]);
        
    }
    
    function reward(){
        $reward = Reward::all();
        return view('movie.Reward', ['reward' => $reward]);
    }
    
}

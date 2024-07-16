<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Food;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Observers\FoodObserver;
use GuzzleHttp\Client;

class FoodController extends Controller {

    public function getFoodList(){
        $food = Food::all();
        return response()->json(Food::all(), 200);
    }
    
    /////////////////////////////////////BackEnd/////////////////////////////////////
    public function __construct() {
        Food::observe(FoodObserver::class);
    }

    private function savePhoto($file) {
        if (in_array($file->getClientOriginalExtension(), ['jpeg', 'png', 'jpg', 'jfif'])) {
            $name = Str::ulid() . '.' . $file->getClientOriginalExtension();
            Image::make($file)->fit(200, 200)->save(public_path("/photos/$name"));

            return $name;
        }

        return null;
    }

    private function deletePhoto($name) {
        if ($name != '0.jpg') {
            File::delete(public_path("/photo/$name"));
        }
    }

    public function index() {
        $food = food::all();
        return view('BackEnd.Food.ShowFoodList', ['food' => $food]);

    }
    
    public function store(Request $req) {
        $this->validate($req, [
            'food_id' => ['required', 'unique:food'],
            'name' => ['required', 'max:50', Rule::unique('food')],
            'price' => ['required', 'numeric', 'min:0', 'decimal:2'],
            'photo' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,jfif'],
        ]);

        $food = new Food();
        $food->food_id = $req->food_id;
        $food->name = $req->name;
        $food->price = $req->price;
        $food->photo = $this->savePhoto($req->photo);
        $food->save();

        return redirect('/food')->with('success', 'Food has been added');
    }

    public function create() {
        return view('BackEnd.Food.CreateFood');
    }

    public function show(Food $food)
    {
       
        $xml = new \SimpleXMLElement('<food></food>');
        $xml->addChild('id', $food->food_id);
        $xml->addChild('name', $food->name);
        $xml->addChild('price', $food->price);
        $xml->addChild('photo', asset('photos/' . $food->photo));
        
        // Format the XML with line breaks and indentation
        $proc = new \XSLTProcessor();
        $xslDoc = new \DOMDocument();
        $xslDoc->load(resource_path('views/BackEnd/xml/ShowFood.xsl'));
        $proc->importStylesheet($xslDoc);
        $xmlString = $xml->asXML();
        $html = $proc->transformToXml(new \SimpleXMLElement($xmlString));
        //redirect to xsl path
        return response($html)->header('text/html', 'application/xml');
    }


    public function edit(Food $food) {
        return view('BackEnd.Food.EditFood', ['f' => $food]);
    }

    // PUT /food/{id}
    public function update(Request $req, Food $food) {
        $this->validate($req, [
            'name' => ['required', 'max:50', Rule::unique('food')->ignore($food->id)],
            'price' => ['required', 'numeric', 'min:0', 'decimal:2'],
            'photo' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,jfif'],
        ]);

        $f = $food;
        $f->name = $req->name;
        $f->price = $req->price;
        if ($req->photo) {
            $this->deletePhoto($f->photo);
            $f->photo = $this->savePhoto($req->photo);
        }

        $f->save();

        return redirect('/food')->with('info', 'Food is successfully updated');
    }

    // DELETE /food/{id}
    public function destroy(Food $food) {
        $f = $food;
        $this->deletePhoto($f->photo);
        $f->delete();
        return redirect('/food')->with('info', 'Food is successfully deleted');
    }

    /////////////////////////////////////FrontEnd/////////////////////////////////////
    public function FrontEndIndex()
    {
        $food = Food::all();

        return view('Food.ShowFoodFrontEnd', ['food' => $food]);
    } 
    
    public function checkout(Request $request){
         $selectedFoods = $request->input('food_id');
        
//        // You now have an array of selected food ids which were checked in the form
//        foreach ($selectedFoods as $foodId) {
//            echo "Food id: $foodId";
//        }
     $foodPrice = 0;   
    $foods = array();
    $foodId = array();
    foreach ($selectedFoods as $food_id) {
        $food = Food::all()->where('food_id', $food_id)->first();
        $foodPrice += $food->price;
        array_push($foods, $food);
         array_push($foodId, $food->food_id);
    }
    session(['foods' => $foodId]);
      session(['foodPrice' => $foodPrice]);
    return view('Food/CheckOut', ['foods' => $foods]);
    }
}
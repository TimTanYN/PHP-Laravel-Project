<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SeatController;



Route::get('/custLogin', [LoginController::class,'frontendLogin']);
Route::post('/customer/login', [LoginController::class, 'login'])->name('customer.login');
Route::get('/', [HomeControler::class,'index']);
Route::get('/back', [HomeControler::class,'back']);
Route::resource('/movie', MovieController::class)->middleware('role:admin,editor');
Route::resource('/movies', MovieController::class)->middleware('role:admin');
Route::resource('/hall', HallController::class);
Route::resource('/seat', SeatController::class);
Route::get('/users', [MovieController::class,'ticket']);
Route::get('/movieBack', [MovieController::class,'showBackend']);
Route::get('/home', [MovieController::class,'home'])->name('home');
Route::post('/movies/search', [MovieController::class, 'search']);
Route::post('/movies/selected', [MovieController::class, 'handleSelected']);
Route::post('/movies/showtime', [MovieController::class, 'showtime']);
Route::post('/movies/hall', [MovieController::class, 'hall']);
Route::post('/movie/quantity', [MovieController::class, 'ticket']);
Route::post('/book-seat', [MovieController::class, 'seatStore']);
Route::post('/movie/seat', [MovieController::class, 'seat']);
Route::get('/set-role/{role}', [AuthController::class, 'setRole']);
Route::resource('/movieDelete', MovieController::class)->middleware('role:admin');
Route::resource('/showtimeBack', ShowtimeController::class);
Route::post('/showtime/createNew', [ShowtimeController::class,'showtimeCreateNew']);
Route::resource('/showtime', ShowtimeController::class);
Route::get('/contact', [ContactUsController::class,'indexs']);
Route::get('/faq', [FaqController::class,'index']);
Route::get('/info', [ContactUsController::class,'info']);
//Order
Route::get('/order', [OrderController::class,'index']);
// Route::get('/order', [CustomerController::class,'index']);
Route::get('/order/create', [OrderController::class,'create'])->name('order.create');
Route::get('/order/index', [OrderController::class,'index'])->name('order.index');
Route::get('/order/edit/{id}', [OrderController::class,'edit'])->name('edit');
Route::put('/order/edit/{id}', [OrderController::class,'update'])->name('edit');
Route::get('/order/delete{id}', [OrderController::class,'destroy'])->name('order.delete');
Route::get('/order/orderList', [OrderController::class,'getAllOrder'])->name('order.orderList');
Route::post('orders/process', [OrderController::class, 'processOrder'])->name('order.processOrder');
//Route::get('/order/orderFrontend', [OrderController::class,'frontEnd'])->name('order.orderFrontend');
Route::get('/order/orderFrontend', [OrderController::class,'calculateTotalPrice'])->name('order.orderFrontend');

//Customer
Route::get('/customer/customerList', [CustomerController::class,'index'])->name('customerList');
Route::get('/customer/customerCreate', [CustomerController::class,'create'])->name('customer.customerCreate');
Route::get('/customer/customerEdit/{id}', [CustomerController::class,'edit'])->name('customerEdit');
Route::put('//customer/customerEdit/{id}', [CustomerController::class,'update'])->name('customerEdit');
Route::get('/customer/customerDelete/{id}', [CustomerController::class,'destroy'])->name('customerDelete');



Route::resource('/order', App\Http\Controllers\OrderController::class);
Route::resource('/customer', App\Http\Controllers\CustomerController::class);
// Route::resource('/food', App\Http\Controllers\FoodController::class);
// Route::resource('/item', App\Http\Controllers\ItemController::class);


//Route::get('/', [HomeController::class, 'index']);
Route::get('/frontendFood', [FoodController::class, 'FrontEndIndex']);
Route::get('/food/{food}.xml', [FoodController::class, 'show']);

Route::resource('/food', FoodController::class);
Route::resource('/ticket', TicketController::class);

Route::post('/checkout',[FoodController::class, 'checkout']); 
    
//login
Route::get('/login/register', [LoginController::class,'register'])->name('login.register');

//reward
Route::resource('/reward', RewardController::class);
Route::post('/getReward', [RewardController::class, 'giveReward']);


Route::get('/about', [HomeController::class, 'about']);
Route::get('/rewards', [RewardController::class, 'reward']);

//FAQ
Route::get('/faq', [FaqController::class,'index']);

Route::resource('/staff', StaffController::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'verifylogin']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/about-us', [AboutUsController::class,'show']);




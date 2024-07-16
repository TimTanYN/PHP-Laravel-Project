<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




 Route::get('showtimeShow', 'ShowtimeController@showtimeBackend');
 Route::post('addShowtime','ShowtimeController@showtimeAdd');
 Route::put('updateShowtime/{showtimeId}','ShowtimeController@showtimeUpdate');
 Route::delete('deleteShowtime/{showtimeId}','ShowtimeController@showtimeDelete');
Route::get('food', [FoodController::class,'getFoodList']);
Route::get('ticket', [TicketController::class,'getTicketList']);
Route::get('staffList', [StaffController::class,'getStaffList']);
Route::get('food', [FoodController::class,'getFoodList']);
Route::get('ticket', [TicketController::class,'getTicketList']);
Route::get('customerList', [CustomerController::class,'getCustomerList']);
Route::get('orderList', [OrderController::class,'getOrderList']);


<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Get All Listings

Route::get('/', [ListingController::class,'index']);


//Show create form
Route::get("/listings/create",[ListingController::class,'create']);

//store newly created Listing
Route::post("/listings",[ListingController::class,'store']);

//show edit form
Route::get("/listings/{listing}/edit",[ListingController::class,'edit']);

//Updatae listing
Route::put("/listings/{listing}/",[ListingController::class,'update']);

//Updatae listing
Route::delete("/listings/{listing}/",[ListingController::class,'destroy']);

//Get Single Listing
Route::get("/listings/{listing}/",[ListingController::class,'show']);


//Show register/create form
Route::get('/register',[UserController::class,'create']);

//create new users
Route::post('/users',[UserController::class,'store']);

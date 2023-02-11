<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::view("coming","coming");
//
//Route::get("/users",function(){
//    return "No users";
//});

//Route::get("customers",[\App\Http\Controllers\CustomerController::class,'index']);

Route::resource("customers",\App\Http\Controllers\CustomerController::class);

Route::get("/users",[\App\Http\Controllers\Users\UserController::class,"index"])->name("users");
Route::get("/users/create",[\App\Http\Controllers\Users\UserController::class,"create"])->name("users.create");
Route::post("/users",[\App\Http\Controllers\Users\UserController::class,"store"])->name("users.store");
Route::get("/users/{id}",[\App\Http\Controllers\Users\UserController::class,"show"])->name("users.show");
Route::get("/users/{id}/edit",[\App\Http\Controllers\Users\UserController::class,"edit"])->name("users.edit");
Route::put("/users/{id}/update",[\App\Http\Controllers\Users\UserController::class,"update"])->name("users.update");
Route::delete("/users/{id}/destroy",[\App\Http\Controllers\Users\UserController::class,"delete"])->name("users.destroy");

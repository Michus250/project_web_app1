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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/',[App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/index',[App\Http\Controllers\UserController::class, 'index'])->middleware('can:isAdmin');
    Route::get('/createUser',[App\Http\Controllers\UserController::class, 'createEmployee'])->middleware('can:isAdmin');
    Route::post('/createUser',[App\Http\Controllers\EmployeeControler::class, 'createEmployee'])->middleware('can:isAdmin');
    // Route::post('/laravel-fetch-example',[App\Http\Controllers\UserController::class, 'createEmployeeRecord'])->middleware('can:isAdmin');
    Route::get('/changeData',[App\Http\Controllers\UserController::class, 'changeData']);
    Route::post('/changeData',[App\Http\Controllers\UserController::class, 'changeUserData']);
    Route::post('/getDataUser',[App\Http\Controllers\UserController::class, 'changeUserData']);
});


    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reception_hours', [App\Http\Controllers\HomeController::class, 'index']);

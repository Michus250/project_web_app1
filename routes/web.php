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
    
    Route::middleware('can:isAdmin')->group(function () {

        Route::get('/createUser',[App\Http\Controllers\UserController::class, 'createEmployee']);
        Route::post('/createUser',[App\Http\Controllers\EmployeeControler::class, 'createEmployee']);
        Route::get('/showAll',[App\Http\Controllers\UserController::class, 'showAll']);

    });
    

    Route::get('/changeData',[App\Http\Controllers\UserController::class, 'changeData']);
    Route::post('/changeData',[App\Http\Controllers\UserController::class, 'changeUserData']);
    Route::post('/getDataUser',[App\Http\Controllers\UserController::class, 'changeUserData']);
});


    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reception_hours', [App\Http\Controllers\HomeController::class, 'index']);

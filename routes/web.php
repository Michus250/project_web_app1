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
    Route::middleware(['can:isDoctor'])->group(function () {
        Route::get('/changeHours',[App\Http\Controllers\EmployeeControler::class, 'changeHoursDoctor']);
        Route::post('/changeHours',[App\Http\Controllers\EmployeeControler::class, 'changeHoursDoctorJson']);
        
        
    });

    Route::middleware(['can:isEmployee'])->group(function (){
        Route::get('/createExamination',[App\Http\Controllers\ExaminationController::class, 'createExamination']);
        Route::post('/createExamination',[App\Http\Controllers\ExaminationController::class, 'createExaminationPost']);
        Route::delete('/createExamination',[App\Http\Controllers\ExaminationController::class, 'deleteExamination']);
    });
    Route::middleware(['can:isUser'])->group(function () {
        Route::get('/createVisit',[App\Http\Controllers\PageController::class, 'createVisit']);
        Route::post('/createVisit',[App\Http\Controllers\ScheludeVisitsController::class, 'createVisit']);
        
    });
    

    Route::get('/changeData',[App\Http\Controllers\UserController::class, 'changeData']);
    Route::post('/changeData',[App\Http\Controllers\UserController::class, 'changeUserData']);
    Route::post('/getDataUser',[App\Http\Controllers\UserController::class, 'changeUserData']);
});


    

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/receptionHours', [App\Http\Controllers\PageController::class, 'receptionHours']);
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact']);



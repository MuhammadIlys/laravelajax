<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Website;


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

Route::get('/',[HomeController::class,'students'])->name('students');
Route::post('students',[HomeController::class,'store'])->name('store_students');
Route::post('stu',[HomeController::class,'stu']);

Route::get('fetch_students',[HomeController::class,'fetch_students'])->name('fetch_students');
Route::get('edit_student/{id}',[HomeController::class,'edit_student'])->name('edit_student');
Route::put('update_student/{id}',[HomeController::class,'update_student'])->name('update_student');
Route::delete('delete_student/{id}',[HomeController::class,'delete_student'])->name('delete_student');


Route::get('email',[HomeController::class,'email']);
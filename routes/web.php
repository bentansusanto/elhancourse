<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\User\DashboardController;
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



Route::resource('/course', CourseController::class);

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('categories/create','create');
    Route::post('categories','store');
    Route::delete('categories/{category}','destroy');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/register','userRegister');
    Route::post('/register','register');
    Route::get('/login','userLogin');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::resource('/blogs',BlogController::class);

Route::resource('/kategoris',KategoriController::class);

Route::get('/user',[DashboardController::class,'dashboard']);

<?php
// Authentication
use App\Http\Controllers\Auth\AuthController;

// Admin Controller
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MentorController;
// UserController
use App\Http\Controllers\User\DashboardController;

// NonuserController

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

Route::resource('/mentors', MentorController::class);

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('categories/create','create');
    Route::post('categories','store');
    Route::delete('categories/{category}','destroy');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/register','userRegister')->middleware('guest');
    Route::post('/register','register');
    Route::get('/login','userLogin')->middleware('guest')->name('login');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::resource('/blogs',BlogController::class);

Route::resource('/kategoris',KategoriController::class);

Route::get('/user',[DashboardController::class,'dashboard'])->middleware('auth');

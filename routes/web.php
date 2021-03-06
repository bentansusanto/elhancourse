<?php
use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Auth\AuthController;

// Admin Controller
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminMentorController;
// UserController
use App\Http\Controllers\User\DashboardController;

// NonuserController
use App\Http\Controllers\Nonuser\HomeController;




// Admin
Route::get('/dashboard',[AdminHomeController::class,'dashboard']);

Route::resource('/courses', AdminCourseController::class);

Route::resource('/blogs',BlogController::class);

Route::resource('/mentors', AdminMentorController::class);

Route::resource('/kategoris',KategoriController::class);

Route::controller(AdminCategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('/categories/create','create');
    Route::post('/categories','store');
    Route::delete('/categories/{category}','destroy');
});

// Authentication
Route::controller(AuthController::class)->group(function(){
    Route::get('/register','userRegister')->middleware('guest');
    Route::post('/register','register');
    Route::get('/login','userLogin')->middleware('guest')->name('login');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

// Nonuser
Route::controller(HomeController::class)->group(function(){
    Route::get('/','home');
    Route::get('/about','about');
    Route::get('/teacher','mentor');
    Route::get('/contact','contact');
});

// User
Route::get('/user',[DashboardController::class,'dashboard'])->middleware('auth');





<?php
use Illuminate\Support\Facades\Route;

// Authentication
use App\Http\Controllers\Auth\AuthController;

// Admin Controller
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Nonuser\HomeController;
// UserController
use App\Http\Controllers\User\DashboardController;

// NonuserController




// Admin
Route::resource('/course', CourseController::class);
Route::resource('/mentors', MentorController::class);
Route::resource('/blogs',BlogController::class);
Route::resource('/kategoris',KategoriController::class);
Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('categories/create','create');
    Route::post('categories','store');
    Route::delete('categories/{category}','destroy');
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
Route::get('/',[HomeController::class,'home']);

// User
Route::get('/user',[DashboardController::class,'dashboard'])->middleware('auth');





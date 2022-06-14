<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MentorController;
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

Route::resource('/course', CourseController::class);

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories','index');
    Route::get('categories/create','create');
    Route::post('categories','store');
    Route::delete('categories/{category}','destroy');
});

Route::resource('/mentors',MentorController::class);

Route::resource('/blogs', BlogController::class);
Route::resource('/kategoris', KategoriController::class);
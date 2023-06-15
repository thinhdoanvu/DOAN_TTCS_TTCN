<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

// Admin Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SportController;

//Model
use App\Models\Category;
use App\Models\Country;
use App\Models\Sport;

use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class,'category'])->name('category');
Route::get('/quoc-gia/{slug}', [IndexController::class,'country'])->name('country');
Route::get('/the-thao/{slug}', [IndexController::class,'sport'])->name('sport');
Route::get('/tin-tuc/{slug}', [IndexController::class,'post'])->name('post');
Route::get('/post', [IndexController::class, 'post'])->name('post');
Route::get('/timkiem',[IndexController::class, 'search'])->name('search');

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

//Route admin
Route::resource('category', CategoryController::class);
Route::post('resorting',[CategoryController::class,'resorting'])->name('resorting');

Route::resource('country', CountryController::class);
Route::resource('sport', SportController::class);
Route::resource('post', PostController::class);



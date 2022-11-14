<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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
  return view('home', [
    'title' => 'Home',
  ]);
});

Route::get('/about', function () {
  return view('about', [
    'title' => 'About Me',
    'name' => 'Fadjrir Herlambang',
    'email' => 'fadjrir.co.id@gmail.com',
  ]);
});

Route::name('posts')->group(function () {
  Route::get('/posts', [PostController::class, 'index']);
  Route::get('/posts/{post:slug}', [PostController::class, 'show']);
});


Route::group(['middleware' => [
  'auth'
]], function () {
  // Logout on LoginController
  Route::post('/logout', [LoginController::class, 'logout']);

  // DashboardPostController
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::get('/dashboard/posts/createSlug', [DashboardPostController::class, 'createSlug']);
  Route::resource('/dashboard/posts', DashboardPostController::class);
});

Route::group(['middleware' => [
  'guest'
]], function () {
  // LoginController
  Route::name('login')->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate']);
  });

  // RegisterController
  Route::name('register')->group(function () {
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
  });
});

Route::group(['middleware' => [
  'auth', 'isAdmin'
]], function () {
  // AdminCategoryController
  Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');
});

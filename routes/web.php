<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login', function () {
//     return view('login', [
//         "title" => "Login"
//     ]);
// });
Route::post('/login', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::group(['namespace' => 'Dashboard'], function () {
//     Route::resource('/dashboard', 'DashboardController');
// });

Route::get('/dashboard', 'App\Http\Controllers\Dashboard\DashboardController@index');

Route::get('/dashboard/detail', 'App\Http\Controllers\Dashboard\DashboardController@detail');

Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

Route::get('/download', 'App\Http\Controllers\DownloadController@index');

Route::get('export', 'App\Http\Controllers\Dashboard\DashboardController@export')->name('export');


Auth::routes();

// require __DIR__ . '/auth.php';

<?php

use Illuminate\Support\Facades\Auth;
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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'MainController@index')->name('home');

// static pages
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/about-us', function () {
    return view('user.about-us');
})->name('about-us');

Route::get('/season/timetable', function () {
    return view('user.season.timetable');
})->name('season.timetable');

// testing
Route::get('/season/table', function () {
    return view('user.season.table');
})->name('season.table');

Route::get('/season/team', function () {
    return view('user.season.team');
})->name('season.team');

Route::get('/season/stats', function () {
    return view('user.season.stats');
})->name('season.stats');

/* ====================== */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

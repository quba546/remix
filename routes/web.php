<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

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

Route::group([], function () {
    Route::get('/', [MainController::class, 'index'])
        ->name('homePage');

    Route::get('/contact', function () {
        return view('user.contact');
    })->name('contact');

    Route::get('/about-us', function () {
        return view('user.about-us');
    })->name('about-us');

    Route::group([
        'prefix' => '/season/',
        'as' => 'season.'
    ], function () {
        Route::get('timetable', function () {
            return view('user.season.timetable');
        })->name('timetable');

        Route::get('table', function () {
            return view('user.season.table');
        })->name('table');

        Route::get('team', function () {
            return view('user.season.team');
        })->name('team');

        Route::get('stats', function () {
            return view('user.season.stats');
        })->name('stats');
    });

    Route::group([
        'prefix' => '/admin/',
        'as' => 'admin.'
    ], function () {
        Route::get('', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('table', function () {
            return view('admin.table');
        })->name('table');

        Route::get('matches', function () {
            return view('admin.matches');
        })->name('matches');

        Route::group([
            'prefix' => 'player/',
            'as' => 'player.'
        ], function () {
            Route::get('list', function () {
                return view('admin.list');
            })->name('list');

            Route::get('details/{id}', function () {
                return view('admin.player-details');
            })->name('details');
        });
    });
});

/* ====================== */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

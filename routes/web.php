<?php

use App\Http\Controllers\UserController;
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

Route::group([], function () {
    Route::get('/', [UserController::class, 'index'])
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

        Route::get('table', [UserController::class, 'showTable'])
            ->name('table');

        Route::get('team', [UserController::class, 'showPlayers'])
            ->name('team');

        Route::get('stats', [UserController::class, 'showPlayersStats'])
            ->name('stats');
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

        Route::group([
            'prefix' => 'match/',
            'as' => 'match.'
        ], function () {
            Route::get('last', function () {
                return view('admin.last-match');
            })->name('last');

            Route::get('upcoming', function () {
                return view('admin.upcoming-match');
            })->name('upcoming');
        });

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

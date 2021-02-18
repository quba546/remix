<?php

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\PlayerController;
use App\Http\Controllers\Main\PlayerStatsController;
use App\Http\Controllers\Main\StandingController;
use App\Http\Controllers\Admin\LastMatchController;
use App\Http\Controllers\Admin\UpcomingMatchController;
use App\Http\Controllers\Admin\PlayerController as AdminPlayerController;

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
    Route::get('/', [HomeController::class, 'index'])
        ->name('index');

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
        Route::get('/timetable', function () {
            return view('user.season.timetable');
        })->name('timetable');

        Route::get('/standings', [StandingController::class, 'index'])
            ->name('standings.index');

        Route::get('/team', [PlayerController::class, 'index'])
            ->name('team.index');

        Route::get('/stats', [PlayerStatsController::class, 'index'])
            ->name('stats.index');
    });

    Route::group([
        'prefix' => '/admin/',
        'as' => 'admin.'
    ], function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/standings', function () {
            return view('admin.standings');
        })->name('standings');

        Route::group([
            'prefix' => '/matches/',
            'as' => 'matches.'
        ], function () {
            Route::get('/last/edit', [LastMatchController::class, 'edit'])
                ->name('last.edit');

            Route::put('/last', [LastMatchController::class, 'update'])
                ->name('last.update');

            Route::get('/upcoming/edit', [UpcomingMatchController::class, 'edit'])
                ->name('upcoming.edit');

            Route::put('/upcoming', [UpcomingMatchController::class, 'update'])
                ->name('upcoming.update');
        });

        Route::group([
            'prefix' => '/players',
            'as' => 'players.'
        ], function () {
            Route::get('/', [AdminPlayerController::class, 'index'])
                ->name('index');

            Route::post('/', [AdminPlayerController::class, 'store'])
                ->name('store');

            Route::get('/details/{id}', function () {
                return view('admin.player-details');
            })->name('details');
        });
    });
});

/* ====================== */
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

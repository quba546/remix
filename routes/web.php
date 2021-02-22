<?php

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Main\PlayerController;
use App\Http\Controllers\Main\PlayerStatsController;
use App\Http\Controllers\Main\StandingController;
use App\Http\Controllers\Admin\LastMatchController;
use App\Http\Controllers\Admin\UpcomingMatchController;
use App\Http\Controllers\Admin\PlayerController as AdminPlayerController;
use App\Http\Controllers\Admin\StandingController as AdminStandingController;
use App\Http\Controllers\PageController;
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

Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('index');

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

        Route::get('/standing/create', [AdminStandingController::class, 'create'])
            ->name('standing.create');

        Route::post('/standing', [AdminStandingController::class, 'store'])
            ->name('standing.store');

        Route::delete('/standing', [AdminStandingController::class, 'destroy'])
            ->name('standing.destroy');

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

            Route::put('/', [AdminPlayerController::class, 'updatePlayedMatches'])
                ->name('update.playedMatches');

            Route::post('/', [AdminPlayerController::class, 'store'])
                ->name('store');

            Route::put('/{player}', [AdminPlayerController::class, 'update'])
                ->name('update');

            Route::get('/{player}/edit', [AdminPlayerController::class, 'edit'])
                ->name('edit');

            Route::delete('/{player}', [AdminPlayerController::class, 'destroy'])
                ->name('destroy');

            Route::delete('/image/{player}', [AdminPlayerController::class, 'destroyImage'])
                ->name('destroy.image');
        });
    });

    // route for static pages
    Route::get('/{page}', PageController::class)
        ->name('page')
        ->where('page', 'about|contact');
});

/* ====================== */
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

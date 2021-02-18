<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\LastMatchRepository;
use App\Repository\Eloquent\MatchTypeRepository;
use App\Repository\Eloquent\PlayerRepository;
use App\Repository\Eloquent\StandingRepository;
use App\Repository\Eloquent\UpcomingMatchRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\LastMatchRepositoryInterface;
use App\Repository\MatchTypeRepositoryInterface;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\StandingRepositoryInterface;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(StandingRepositoryInterface::class, StandingRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
        $this->app->bind(LastMatchRepositoryInterface::class, LastMatchRepository::class);
        $this->app->bind(UpcomingMatchRepositoryInterface::class, UpcomingMatchRepository::class);
        $this->app->bind(MatchTypeRepositoryInterface::class, MatchTypeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

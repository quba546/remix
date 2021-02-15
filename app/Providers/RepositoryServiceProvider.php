<?php

namespace App\Providers;

use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\LastMatchRepository;
use App\Repository\Eloquent\PlayersStatsRepository;
use App\Repository\Eloquent\SeasonTableRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\LastMatchRepositoryInterface;
use App\Repository\PlayersStatsRepositoryInterface;
use App\Repository\SeasonTableRepositoryInterface;
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
        $this->app->bind(SeasonTableRepositoryInterface::class, SeasonTableRepository::class);
        $this->app->bind(PlayersStatsRepositoryInterface::class, PlayersStatsRepository::class);
        $this->app->bind(LastMatchRepositoryInterface::class, LastMatchRepository::class);
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

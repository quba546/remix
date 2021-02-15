<?php

namespace App\Http\Controllers;

use App\Repository\PlayersStatsRepositoryInterface;
use App\Repository\SeasonTableRepositoryInterface;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    private SeasonTableRepositoryInterface $seasonTableRepository;
    private PlayersStatsRepositoryInterface $playersStatsRepository;

    public function __construct(
        SeasonTableRepositoryInterface $seasonTableRepository,
        PlayersStatsRepositoryInterface $playersStatsRepository
    )
    {
        $this->seasonTableRepository = $seasonTableRepository;
        $this->playersStatsRepository = $playersStatsRepository;
    }

    public function index() : View
    {
        return view('user.home',
            [
                'shortTable' => $this->seasonTableRepository->shortTable(),
                'bestScorers' => $this->playersStatsRepository->bestScorers(3)
            ]
        );
    }

    public function showTable() : View
    {
        return view('user.season.table',
            [
                'table' => $this->seasonTableRepository->table()
            ]
        );
    }

    public function showPlayersStats() : View
    {
        return view('user.season.stats',
            [
               'playersStats' => $this->playersStatsRepository->playersList()
            ]
        );
    }

    public function showPlayers() : View
    {
        return view('user.season.team',
            [
                'players' => $this->playersStatsRepository->shortPlayersList()
            ]
        );
    }
}

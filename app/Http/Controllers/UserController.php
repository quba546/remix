<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\LastMatchRepositoryInterface;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\StandingRepositoryInterface;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    private StandingRepositoryInterface $standingRepository;
    private PlayerRepositoryInterface $playerRepository;
    private LastMatchRepositoryInterface $lastMatchRepository;

    public function __construct(
        StandingRepositoryInterface $standingRepository,
        PlayerRepositoryInterface $playerRepository,
        LastMatchRepositoryInterface $lastMatchRepository
    )
    {
        $this->standingRepository = $standingRepository;
        $this->playerRepository = $playerRepository;
        $this->lastMatchRepository = $lastMatchRepository;
    }

    public function index() : View
    {
        //dd($this->standingRepository->shortStanding());
        return view('user.home',
            [
                'shortStanding' => $this->standingRepository->shortStanding(),
                'bestScorers' => $this->playerRepository->bestScorers(3)
            ]
        );
    }

    public function showStandings() : View
    {
        return view('user.season.standings',
            [
                'standings' => $this->standingRepository->standing()
            ]
        );
    }

    public function showPlayersStats() : View
    {
        return view('user.season.stats',
            [
               'playersStats' => $this->playerRepository->list()
            ]
        );
    }

    public function showPlayers() : View
    {
        return view('user.season.team',
            [
                'players' => $this->playerRepository->shortList()
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\LastMatchRepositoryInterface;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\StandingRepositoryInterface;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    private StandingRepositoryInterface $standingRepository;
    private PlayerRepositoryInterface $playerRepository;
    private LastMatchRepositoryInterface $lastMatchRepository;
    private UpcomingMatchRepositoryInterface $upcomingMatchRepository;

    public function __construct(
        StandingRepositoryInterface $standingRepository,
        PlayerRepositoryInterface $playerRepository,
        LastMatchRepositoryInterface $lastMatchRepository,
        UpcomingMatchRepositoryInterface $upcomingMatchRepository
    )
    {
        $this->standingRepository = $standingRepository;
        $this->playerRepository = $playerRepository;
        $this->lastMatchRepository = $lastMatchRepository;
        $this->upcomingMatchRepository = $upcomingMatchRepository;
    }

    public function index() : View
    {
        return view('user.home',
            [
                'shortStanding' => $this->standingRepository->shortStanding(),
                'bestScorers' => $this->playerRepository->bestScorers(3),
                'lastMatch' => $this->lastMatchRepository->getLastMatch()[0],
                'upcomingMatch' => $this->upcomingMatchRepository->getUpcomingMatch()[0]
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

    public function showPlayers() : View
    {
        return view('user.season.team',
            [
                'players' => $this->playerRepository->shortListPaginated(15)
            ]
        );
    }

    public function showPlayersStats() : View
    {
        return view('user.season.stats',
            [
               'playersStats' => $this->playerRepository->listPaginated(15)
            ]
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Repository\LastMatchRepositoryInterface;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\StandingRepositoryInterface;
use App\Repository\UpcomingMatchRepositoryInterface;


class HomeController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
}

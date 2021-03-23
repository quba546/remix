<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
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
     * @return View
     */
    public function index(): View
    {
        SEOMeta::setTitle('Remix Niebieszczany');
        SEOMeta::setDescription('Oficjalna strona klubu piłkarskiego LKS Remix Niebieszczany');
        SEOMeta::setCanonical(env('APP_URL'));

        return view('user.home',
            [
                'shortStanding' => $this->standingRepository->get(['position', 'team', 'played_matches', 'points', 'league']) ?? [],
                'bestScorers' => $this->playerRepository->bestScorers(3) ?? [],
                'lastMatch' => $this->lastMatchRepository->get() ?? [],
                'upcomingMatch' => $this->upcomingMatchRepository->get() ?? []
            ]
        );
    }
}

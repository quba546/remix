<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\CustomClasses\ReadWriteFileService;
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

        // read standing data from file
        $json = new ReadWriteFileService();
        $data = $json->read();

        return view('user.home',
            [
                'shortStanding' => $this->standingRepository->get(['position', 'team', 'played_matches', 'points']),
                'league' => $data['league'],
                'numberOfPromotionTeams' => $data['numberOfPromotionTeams'],
                'numberOfRelegationTeams' => $data['numberOfRelegationTeams'],
                'bestScorers' => $this->playerRepository->getBestScorers(3),
                'lastMatch' => $this->lastMatchRepository->get(),
                'upcomingMatch' => $this->upcomingMatchRepository->get()
            ]
        );
    }
}

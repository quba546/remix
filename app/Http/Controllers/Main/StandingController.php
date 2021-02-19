<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\StandingRepositoryInterface;
use Illuminate\Contracts\View\View;

class StandingController extends Controller
{
    private StandingRepositoryInterface $standingRepository;

    public function __construct(StandingRepositoryInterface $standingRepository)
    {
        $this->standingRepository = $standingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        return view('user.season.standings',
            [
                'standings' => $this->standingRepository->standing(['position', 'team', 'played_matches', 'points', 'wins', 'draws', 'losses', 'goals_scored', 'goals_conceded', 'goals_difference', 'league']) ?? []
            ]
        );
    }
}

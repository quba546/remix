<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\PlayerRepositoryInterface;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;

class PlayerStatsController extends Controller
{
    private PlayerRepositoryInterface $playerRepository;

    public function __construct(PlayerRepositoryInterface $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        SEOMeta::setTitle('Statystyki zawodników');

        return view('user.season.stats',
            [
                'playersStats' => $this->playerRepository->playersListPaginated(
                        [
                            'first_name',
                            'last_name',
                            'nr',
                            'position',
                            'goals',
                            'assists',
                            'played_matches',
                            'clean_sheets',
                            'yellow_cards',
                            'red_cards'
                        ]
                    )
            ]
        );
    }
}

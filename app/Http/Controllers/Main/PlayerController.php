<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\PlayerRepositoryInterface;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PlayerController extends Controller
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
        SEOMeta::setTitle('Kadra');

        return view('user.season.players',
            [
                'players' => $this->playerRepository->listPaginated(15,
                        [
                            'id',
                            'last_name',
                            'first_name',
                            'nr', 'position',
                            'played_matches'
                        ]
                    ) ?? []
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View|RedirectResponse
    {
        $id = (int)$id;

        SEOMeta::setTitle('Profil zawodnika');

        return $this->playerRepository->playerDetails($id)
            ? view('user.season.player-details',
                [
                    'player' => $this->playerRepository->playerDetails($id)
                ]
            )
            : redirect()
                ->route('season.players.index')
                ->with('error', 'Nie istnieje taki zawodnik');
    }
}

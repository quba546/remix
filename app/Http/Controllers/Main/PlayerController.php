<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\PlayerRepositoryInterface;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;


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

        $columns = ['id', 'first_name', 'last_name', 'nr', 'played_matches', 'image'];

        return view('user.season.players',
            [
                'goalkeepers' => $this->playerRepository->playersList($columns, 'bramkarz') ?? [],
                'defenders' => $this->playerRepository->playersList($columns, 'obrońca') ?? [],
                'midfielders' => $this->playerRepository->playersList($columns, 'pomocnik') ?? [],
                'strikers' => $this->playerRepository->playersList($columns, 'napastnik') ?? []
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $id = (int)$id;

        SEOMeta::setTitle('Profil zawodnika');

        if ($this->playerRepository->playerDetails($id)) {
            return view('user.season.player-details', ['player' => $this->playerRepository->playerDetails($id)]);
        } else {
            $columns = ['id', 'first_name', 'last_name', 'nr', 'played_matches', 'image'];
            Session::flash('error', 'Nie istnieje taki zawodnik');

            return view('user.season.players',
                [
                    'goalkeepers' => $this->playerRepository->playersList($columns, 'bramkarz') ?? [],
                    'defenders' => $this->playerRepository->playersList($columns, 'obrońca') ?? [],
                    'midfielders' => $this->playerRepository->playersList($columns, 'pomocnik') ?? [],
                    'strikers' => $this->playerRepository->playersList($columns, 'napastnik') ?? []
                ]
            );
        }
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('admin.players-list',
            [
                'players' => $this->playerRepository->listPaginated(10,
                        [
                            'id',
                            'first_name',
                            'last_name',
                            'nr',
                            'position',
                            'played_matches',
                            'updated_at'
                        ]
                    ) ?? []
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->playerRepository->savePlayer(
            [
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
                'position' => $request->get('position'),
                'nr' => $request->get('number'),
            ]
        );

        return redirect()->route('admin.players.store')->with('success', 'Poprawnie dodano nowego zawodnika');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id) : View
    {
        return view('admin.player-details',
            [
                'player' => $this->playerRepository->playerDetails($id)[0] ?? []
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id) : RedirectResponse
    {
        $this->playerRepository->updatePlayer($id,
            [
                'firstName' => $request->get('firstName'),
                'lastName' => $request->get('lastName'),
                'nr' => $request->get('number'),
                'position' => $request->get('position'),
                'goals' => $request->get('goals'),
                'assists' => $request->get('assists'),
                'playedMatches' => $request->get('playedMatches'),
                'cleanSheets' => $request->get('cleanSheets'),
                'yellowCards' => $request->get('yellowCards'),
                'redCards' => $request->get('redCards'),
            ]
        );

        return redirect()->route('admin.players.index')->with('success', 'Poprawnie zaktualizowano dane zawodnika o id: ' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id) : RedirectResponse
    {
        return $this->playerRepository->deletePlayer($id)
            ? redirect()->route('admin.players.index')->with('warning', 'Poprawnie usunięto dane zawodnika o id: ' . $id)
            : redirect()->route('admin.players.index')->with('error', 'Wystąpił błąd przy usuwaniu danych zawodnika o id: ' . $id);
    }
}

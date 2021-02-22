<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\SimplePlayerRequest;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function index() : View
    {
        return view('admin.players-list',
            [
                'players' => $this->playerRepository->listPaginated(15,
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
     * @param  PlayerRequest  $request
     * @return RedirectResponse
     */
    public function store(PlayerRequest $request) : ?RedirectResponse
    {
        if ($request->has('form-create-player')) {
            $validated = $request->validated();
            $success = $this->playerRepository->savePlayer(
                [
                    'firstName' => $validated['firstName'],
                    'lastName' => $validated['lastName'],
                    'position' => $validated['position'],
                    'nr' => $validated['number'],
                ]
            );

            return $success
                ? redirect()
                    ->route('admin.players.store')
                    ->with('success', 'Poprawnie dodano nowego zawodnika')
                : redirect()
                    ->route('admin.players.store')
                    ->with('error', 'Wystąpił błąd przy dodawaniu nowego zawodnika');
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int|string $id
     * @return View|RedirectResponse
     */
    public function edit(int|string $id) : View | RedirectResponse
    {
      $id = (int) $id;

      return $this->playerRepository->playerDetails($id)
            ? view('admin.player-details',
                [
                    'player' => $this->playerRepository->playerDetails($id)
                ]
            )
            : redirect()
              ->route('admin.players.index')
              ->with('error', 'Nie istnieje zawodnik o ID: ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlayerRequest  $request
     * @param  int|string  $id
     * @return RedirectResponse
     */
    public function update(PlayerRequest $request, int|string $id) : RedirectResponse
    {
        $id = (int) $id;

        $data = $this->playerRepository->playerDetails($id);

        $validated = $request->validated();

        if (!empty($validated['image'])) {
            $originalPath = Storage::putFile('public/players-images', $validated['image']); // add new player image to storage
            $path = str_replace('public/', '', $originalPath);

            if ($originalPath) {
                Storage::disk('public')->delete($data['image']); // delete old player image from storage
            }
        }

        $success = $this->playerRepository->updatePlayer($id,
            [
                'firstName' => $validated['firstName'],
                'lastName' => $validated['lastName'],
                'nr' => $validated['number'],
                'position' => $validated['position'],
                'goals' => $validated['goals'],
                'assists' => $validated['assists'],
                'playedMatches' => $validated['playedMatches'],
                'cleanSheets' => $validated['cleanSheets'],
                'yellowCards' => $validated['yellowCards'],
                'redCards' => $validated['redCards'],
                'image' => $path ?? $data['image']
            ]
        );

        return $success
            ? redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('success', "Poprawnie zaktualizowano dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})")
            : redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('error', "Wystąpił błąd przy aktualizacji danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SimplePlayerRequest  $request
     * @param  int|string  $id
     * @return RedirectResponse
     */
    public function updatePlayedMatches(SimplePlayerRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        $playerId = (int) $validated['playerId'];

        $data = $this->playerRepository->playerDetails($playerId);

        $success = $this->playerRepository->updatePlayedMatches($playerId, (int) $validated['playedMatches']);

        return $success
            ? redirect()
                ->route('admin.players.index')
                ->with('success', "Poprawnie zaktualizowano dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})")
            : redirect()
                ->route('admin.players.index')
                ->with('error', "Wystąpił błąd przy aktualizacji danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})");
    }

    /**
     * Remove image from the specified resource.
     *
     * @param  int|string  $id
     * @return RedirectResponse
     */
    public function destroyImage(int|string $id) : RedirectResponse
    {
        $id = (int) $id;

        $data = $this->playerRepository->playerDetails($id);

        $path = 'public/' . $data['image'];

        if (Storage::delete($path)) {
            $this->playerRepository->deletePlayerImage($id);

            return redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('warning', "Poprawnie usunięto zdjęcie zawodnika  {$data['first_name']} {$data['last_name']} (ID:{$data['id']})");
        } else {

            return redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('error', "Zawodnik {$data['first_name']} {$data['last_name']} (ID:{$data['id']}) nie ma przypisanego zdjęcia");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int|string  $id
     * @return RedirectResponse
     */
    public function destroy(int|string $id) : RedirectResponse
    {
        $id = (int) $id;

        $data = $this->playerRepository->playerDetails($id);

        return $this->playerRepository->deletePlayer($id)
            ? redirect()
                ->route('admin.players.index')
                ->with('warning', "Poprawnie usunięto dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})")
            : redirect()
                ->route('admin.players.index')
                ->with('error', "Wystąpił błąd przy usuwaniu danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']}");
    }
}

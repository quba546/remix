<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\SimplePlayerRequest;
use App\Models\TemporaryFile;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
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
    public function index(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.players',
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
     * @param PlayerRequest $request
     * @return RedirectResponse
     */
    public function store(PlayerRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();
        $success = $this->playerRepository->savePlayer(
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'position' => $validated['position'],
                'nr' => $validated['nr'],
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id) : View
    {
        Gate::authorize('moderator-level');

        $id = (int)$id;

        if ($this->playerRepository->playerDetails($id)) {
            return view('admin.player-details', ['player' => $this->playerRepository->playerDetails($id)]);
        } else {
            Session::flash('error', 'Nie istnieje zawodnik o ID: ' . $id);

            return view('admin.players',
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PlayerRequest $playerRequest
     * @param string $id
     * @return RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, PlayerRequest $playerRequest, string $id): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $id = (int)$id;

        $data = $this->playerRepository->playerDetails($id);

        $validated = $playerRequest->validated();
        if (isset($request->playerImage)) {
            $folder = substr($request->playerImage, 0, strpos($request->playerImage, '<')); // delete garbage form request
            $temporaryFile = TemporaryFile::where('folder', '=', $folder)->first();

            if ($temporaryFile) {
                Storage::move('public/tmp/' . $folder . '/' . $temporaryFile->filename, 'public/players-images/' . $temporaryFile->filename);
                Storage::deleteDirectory('public/tmp/' . $folder);
                $temporaryFile->delete();

                if (isset($data->image)) {
                    $oldPlayerImagePath = $data->image;
                    $oldPlayerImage = str_replace('players-images/', '', $oldPlayerImagePath);
                    Storage::delete('public/players-images/' . $oldPlayerImage); // delete old player image from storage
                }
            }
        }

        $success = $this->playerRepository->updatePlayer($id,
            [
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'nr' => $validated['nr'],
                'position' => $validated['position'],
                'goals' => $validated['goals'],
                'assists' => $validated['assists'],
                'played_matches' => $validated['played_matches'],
                'clean_sheets' => $validated['clean_sheets'],
                'yellow_cards' => $validated['yellow_cards'],
                'red_cards' => $validated['red_cards'],
                'image' => isset($temporaryFile->filename) ? 'players-images/' . $temporaryFile->filename : $data->image
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

    public function restoreDefaults(string $id) : RedirectResponse
    {
        Gate::authorize('moderator-level');

        $id = (int) $id;

        $success = $this->playerRepository->updatePlayerDefaults($id);

        return $success
            ? redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('info', "Poprawnie zresetowano dane zawodnika o ID:{$id}")
            : redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('error', "Wystąpił błąd przy resetowaniu danych zawodnika o ID:{$id}");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SimplePlayerRequest $request
     * @return RedirectResponse
     */
    public function updatePlayedMatches(SimplePlayerRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');


        $validated = $request->validated();
        $playerId = (int)$validated['playerId'];

        $data = $this->playerRepository->playerDetails($playerId);

        $success = $this->playerRepository->updatePlayedMatches($playerId, (int)$validated['played_matches']);

        return $success
            ? redirect()
                ->route('admin.players.store')
                ->with('success', "Poprawnie zaktualizowano dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})")
            : redirect()
                ->route('admin.players.store')
                ->with('error', "Wystąpił błąd przy aktualizacji danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})");
    }

    /**
     * Remove image from the specified resource.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroyImage(string $id): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $id = (int)$id;

        $data = $this->playerRepository->playerDetails($id);

        $path = 'public/' . $data['image'];

        if (Storage::delete($path)) {
            $this->playerRepository->deletePlayerImage($id);

            return redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('success', "Poprawnie usunięto zdjęcie zawodnika  {$data['first_name']} {$data['last_name']} (ID:{$data['id']})");
        } else {

            return redirect()
                ->route('admin.players.edit', ['player' => $id])
                ->with('error', "Zawodnik {$data['first_name']} {$data['last_name']} (ID:{$data['id']}) nie ma przypisanego zdjęcia");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        Gate::authorize('admin-level');

        $id = (int)$id;

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

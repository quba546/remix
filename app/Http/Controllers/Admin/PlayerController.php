<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\CustomClasses\UploadPhoto;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlayerRequest;
use App\Http\Requests\SimplePlayerRequest;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use \Exception;

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
                'players' => $this->playerRepository->playersListPaginated(
                        [
                            'id',
                            'first_name',
                            'last_name',
                            'nr',
                            'position',
                            'played_matches',
                            'updated_at'
                        ]
                    )
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

        try {
            $this->playerRepository->savePlayer(
                [
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'position' => $validated['position'],
                    'nr' => $validated['nr'],
                ]
            );
            $message = [
                'status' => 'success',
                'message' => 'Poprawnie dodano nowego zawodnika'
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => 'Wystąpił błąd przy dodawaniu nowego zawodnika'
            ];
        }

        return redirect()
            ->route('admin.players.store')
            ->with($message['status'], $message['message']);
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

        return view('admin.player-details', ['player' => $this->playerRepository->playerDetails($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PlayerRequest $playerRequest
     * @param string $id
     * @return RedirectResponse
     */
    public function update(PlayerRequest $playerRequest, string $id): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $id = (int) $id;

        $data = $this->playerRepository->playerDetails($id);

        $validated = $playerRequest->validated();
        if (!empty($validated['image'])) {
            $originalPath = Storage::putFile('public/players-images', $validated['image']); // add new player image to storage
            $path = str_replace('public/', '', $originalPath);

            if ($originalPath) {
                Storage::disk('public')->delete($data['image']); // delete old player image from storage
            }
        }

        try {
            $this->playerRepository->updatePlayerDetails($id,
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
                    'image' => $path ?? $data['image']
                ]
            );
            $message = [
                'status' => 'success',
                'message' => "Poprawnie zaktualizowano dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd przy aktualizacji danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})"
            ];
        }

        return redirect()
            ->route('admin.players.edit', ['player' => $id])
            ->with($message['status'], $message['message']);
    }

    public function restoreDefaults(string $id) : RedirectResponse
    {
        Gate::authorize('moderator-level');

        $id = (int) $id;
        try {
            $this->playerRepository->updatePlayerDefaults($id);
            $message = [
                'status' => 'success',
                'message' => "Poprawnie zresetowano dane zawodnika"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd przy resetowaniu danych zawodnika"
            ];
        }

        return redirect()
            ->route('admin.players.edit', ['player' => $id])
            ->with($message['status'], $message['message']);
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
        $playerId = (int) $validated['playerId'];

        $data = $this->playerRepository->playerDetails($playerId);

        try {
            $this->playerRepository->updatePlayedMatches($playerId, (int) $validated['played_matches']);
            $message = [
                'status' => 'success',
                'message' => "Poprawnie zaktualizowano dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd przy aktualizacji danych zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})"
            ];
        }

        return redirect()
            ->route('admin.players.store')
            ->with($message['status'], $message['message']);
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

        $id = (int) $id;

        $data = $this->playerRepository->playerDetails($id);

        $path = 'public/' . $data['image'];

        if (Storage::delete($path)) {
            $this->playerRepository->deletePlayerImage($id);
            $message = [
                'status' => 'success',
                'message' => 'Poprawnie usunięto zdjęcie zawodnika'
            ];
        } else {
            $message = [
                'status' => 'info',
                'message' => 'Ten zawodnik nie ma przypisanego zdjęcia'
            ];
        }

        return redirect()
            ->route('admin.players.edit', ['player' => $id])
            ->with($message['status'], $message['message']);
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

        try {
            $data = $this->playerRepository->playerDetails($id);
            $this->playerRepository->deletePlayer($id);
            $message = [
                'status' => 'success',
                'message' => "Poprawnie usunięto dane zawodnika {$data['first_name']} {$data['last_name']} (ID:{$data['id']})"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => 'Wystąpił błąd przy usuwaniu danych zawodnika'
            ];
        }

        return redirect()
            ->route('admin.players.index')
            ->with($message['status'], $message['message']);
    }
}

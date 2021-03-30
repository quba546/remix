<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ReadWriteFileService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StandingRequest;
use App\Repository\StandingRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use \Exception;

class StandingController extends Controller
{
    private StandingRepositoryInterface $standingRepository;

    public function __construct(StandingRepositoryInterface $standingRepository)
    {
        $this->standingRepository = $standingRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        Gate::authorize('moderator-level');

        // read standing data from file
        $json = new ReadWriteFileService();
        $data = $json->read();

        return view('admin.standings', [
            'numberOfPromotionTeams' => $data['numberOfPromotionTeams'],
            'numberOfRelegationTeams' => $data['numberOfRelegationTeams'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StandingRequest $request
     * @return RedirectResponse
     */
    public function store(StandingRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        try {
            $this->standingRepository->fillStanding(
                $validated['url'],
                (int) $validated['numberOfPromotionTeams'],
                (int) $validated['numberOfRelegationTeams']
            );

            $message = [
                'status' => 'success',
                'message' => 'Poprawnie dodano dane tabeli ligowej'
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => 'Wystąpił błąd podczas dodawania danych tabeli ligowej'
            ];
        }

        return redirect()
            ->route('admin.standing.create')
            ->with($message['status'], $message['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Gate::authorize('admin-level');

        $this->standingRepository->clearStanding();

        return redirect()
            ->route('admin.standing.create')
            ->with('warning', 'Poprawnie usunięto dane tabeli ligowej');
    }
}

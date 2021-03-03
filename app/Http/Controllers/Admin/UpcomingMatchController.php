<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpcomingMatchRequest;
use App\Repository\MatchTypeRepositoryInterface;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class UpcomingMatchController extends Controller
{
    private UpcomingMatchRepositoryInterface $upcomingMatchRepository;
    private MatchTypeRepositoryInterface $matchTypeRepository;

    public function __construct(
        UpcomingMatchRepositoryInterface $upcomingMatchRepository,
        MatchTypeRepositoryInterface $matchTypeRepository
    )
    {
        $this->upcomingMatchRepository = $upcomingMatchRepository;
        $this->matchTypeRepository = $matchTypeRepository;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.upcoming-match',
            [
                'upcomingMatch' => $this->upcomingMatchRepository->getUpcomingMatch() ?? [],
                'matchTypes' => $this->matchTypeRepository->getMatchTypes() ?? []
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpcomingMatchRequest $request
     * @return RedirectResponse
     */
    public function update(UpcomingMatchRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        $success = $this->upcomingMatchRepository->saveUpcomingMatch(
            [
                'host' => $validated['host'],
                'guest' => $validated['guest'],
                'matchType' => $validated['matchType'],
                'round' => $validated['round'],
                'date' => $validated['date'],
                'place' => $validated['place'],
            ]
        );

        return $success
            ? redirect()
                ->route('admin.matches.upcoming.edit')
                ->with('success', 'Poprawnie dodano dane o najbliższym meczu')
            : redirect()
                ->route('admin.matches.upcoming.edit')
                ->with('error', 'Wystąpił błąd podczas dodawania danych o najbliższym meczu');
    }
}

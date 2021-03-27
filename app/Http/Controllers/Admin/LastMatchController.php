<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LastMatchRequest;
use App\Repository\LastMatchRepositoryInterface;
use App\Repository\MatchTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

class LastMatchController extends Controller
{
    private LastMatchRepositoryInterface $lastMatchRepository;
    private MatchTypeRepositoryInterface $matchTypeRepository;

    public function __construct(
        LastMatchRepositoryInterface $lastMatchRepository,
        MatchTypeRepositoryInterface $matchTypeRepository
    )
    {
        $this->lastMatchRepository = $lastMatchRepository;
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

        return view('admin.last-match',
            [
                'lastMatch' => $this->lastMatchRepository->get() ?? [],
                'matchTypes' => $this->matchTypeRepository->getMatchTypes() ?? []
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LastMatchRequest $request
     * @return RedirectResponse
     */
    public function update(LastMatchRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        $success = $this->lastMatchRepository->save(
            [
                'host' => $validated['host'],
                'guest' => $validated['guest'],
                'match_type_id' => $validated['match_type_id'],
                'round' => $validated['round'],
                'date' => $validated['date'],
                'score' => $validated['score']
            ]
        );

        return $success
            ? redirect()
                ->route('admin.matches.last.edit')
                ->with('success', 'Poprawnie dodano dane o ostatnim meczu')
            : redirect()
                ->route('admin.matches.last.edit')
                ->with('error', 'Wystąpił błąd podczas dodawania danych o ostatnim meczu');
    }
}

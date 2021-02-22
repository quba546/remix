<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatchRequest;
use App\Repository\LastMatchRepositoryInterface;
use App\Repository\MatchTypeRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
    public function edit() : View
    {
        return view('admin.last-match',
            [
                'lastMatch' => $this->lastMatchRepository->getLastMatch() ?? [],
                'matchTypes' => $this->matchTypeRepository->getMatchTypes() ?? []
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MatchRequest  $request
     * @return RedirectResponse
     */
    public function update(MatchRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        $this->lastMatchRepository->saveLastMatch(
            [
                'host' => $validated['host'],
                'guest' => $validated['guest'],
                'matchType' => $validated['matchType'],
                'round' => $validated['round'] ?? null,
                'date' => $validated['date'],
                'score' => $validated['score'],
            ]
        );

        return redirect()
            ->route('admin.matches.last.edit')
            ->with('success', 'Poprawnie dodano dane o ostatnim meczu');
    }
}

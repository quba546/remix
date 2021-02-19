<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\MatchTypeRepositoryInterface;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
    public function edit() : View
    {
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
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function update(Request $request) : RedirectResponse
    {
        $this->upcomingMatchRepository->saveUpcomingMatch(
            [
                'host' => $request->get('host'),
                'guest' => $request->get('guest'),
                'matchType' => $request->get('matchType'),
                'round' => $request->get('round') ?? null,
                'date' => $request->get('date'),
                'place' => $request->get('place'),
            ]
        );

        return redirect()->route('admin.matches.upcoming.edit')->with('success', 'Poprawnie dodano dane o najbliższym meczu');
    }
}

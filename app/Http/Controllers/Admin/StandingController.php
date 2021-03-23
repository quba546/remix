<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StandingRequest;
use App\Repository\StandingRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;

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

        return view('admin.standings');
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

        $standingUrl = $validated['url'];

        return $this->standingRepository->fillStanding($standingUrl)
            ? redirect()
                ->route('admin.standing.create')
                ->with('success', 'Poprawnie dodano dane tabeli ligowej')
            : redirect()
                ->route('admin.standing.create')
                ->with('error', 'Wystąpił błąd podczas dodawania danych tabeli ligowej');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Gate::authorize('admin-level');

        $this->standingRepository->delete();

        return redirect()
            ->route('admin.standing.create')
            ->with('warning', 'Poprawnie usunięto dane tabeli ligowej');
    }
}

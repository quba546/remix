<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimetableRequest;
use App\Repository\TimetableRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TimetableController extends Controller
{
    private TimetableRepositoryInterface $timetableRepository;

    public function __construct(TimetableRepositoryInterface $timetableRepository)
    {
        $this->timetableRepository = $timetableRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.add-timetable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TimetableRequest $request
     * @return RedirectResponse
     */
    public function store(TimetableRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        $success = $this->timetableRepository->addRound(
            [
                'round' => $validated['round'],
                'date' => $validated['date'],
                'matches' => $validated['matches']
            ]
        );

        return $success
            ? redirect()
                ->route('admin.timetable.create')
                ->with('success', 'Poprawnie dodano nową kolejkę do termianarza')
            : redirect()
                ->route('admin.timetable.create')
                ->with('error', "Kolejka {$validated['round']} już istnieje w terminarzu!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return View
     */
    public function edit(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.delete-timetable',
            [
                'rounds' => $this->timetableRepository->getRounds() ?? []
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroyOne(Request $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $success = $this->timetableRepository->deleteRound((int)$request->round);

        return $success
            ? redirect()
                ->route('admin.timetable.edit')
                ->with('success', "Poprawnie usunięto {$request->round} kolejkę z termianarza")
            : redirect()
                ->route('admin.timetable.edit')
                ->with('error', "Wystąpił błąd podczas usuwania {$request->round} z terminarza!");
    }

    /**
     * Remove the all resources from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Gate::authorize('admin-level');

        $this->timetableRepository->deleteAll();

        return redirect()
            ->route('admin.dashboard')
            ->with('info', "Poprawnie usunięto cały terminarz");
    }
}

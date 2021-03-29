<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\CustomClasses\ParseTimetable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TimetableRequest;
use App\Repository\TimetableRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \Exception;

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

        try {
            $matches = (new ParseTimetable())->parseMatchesFromUrl($validated['matches']);
        } catch (Exception $e) {
            return redirect()
                ->route('admin.timetable.create')
                ->with('error', 'Format meczy podanych w tej kolejce jest nieprawidłowy. Spróbuj jeszcze raz.');
        }

        $success = $this->timetableRepository->saveRound(
            [
                'round' => $validated['round'],
                'date' => $validated['date'],
                'matches' => $matches
            ]
        );

        if ($success) {
          $message = [
              'status' => 'success',
              'message' => 'Poprawnie dodano nową kolejkę do termianarza'
          ];
        } else {
            $message = [
                'status' => 'error',
                'message' => "Kolejka {$validated['round']} już istnieje w terminarzu!"
            ];
        }

        return redirect()
            ->route('admin.timetable.create')
            ->with($message['status'], $message['message']);
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
                'rounds' => $this->timetableRepository->getTimetable(['round', 'date'])
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

        try {
            $this->timetableRepository->deleteRound((int)$request->round);
            $message = [
                'status' => 'success',
                'message' => "Poprawnie usunięto {$request->round} kolejkę z termianarza"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd podczas usuwania {$request->round} z terminarza!"
            ];
        }

        return redirect()
            ->route('admin.timetable.edit')
            ->with($message['status'], $message['message']);
    }

    /**
     * Remove the all resources from storage.
     *
     * @return RedirectResponse
     */
    public function destroy(): RedirectResponse
    {
        Gate::authorize('admin-level');

        $this->timetableRepository->clearTimetable();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', "Poprawnie usunięto cały terminarz");
    }
}

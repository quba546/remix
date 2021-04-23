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
use \Exception;

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

    public function update(LastMatchRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        try {
            $this->lastMatchRepository->save(
                [
                    'host' => $validated['host'],
                    'guest' => $validated['guest'],
                    'match_type_id' => $validated['match_type_id'],
                    'round' => $validated['round'],
                    'date' => $validated['date'],
                    'score' => $validated['score']
                ]
            );
            $message = [
                'status' => 'success',
                'message' => 'Poprawnie dodano dane o ostatnim meczu'
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => 'Wystąpił błąd podczas dodawania danych o ostatnim meczu'
            ];
        }

        return redirect()
            ->route('admin.matches.last.edit')
            ->with($message['status'], $message['message']);
    }
}

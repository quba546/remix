<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\TimetableRepositoryInterface;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;

class TimetableController extends Controller
{
    private TimetableRepositoryInterface $matchRoundRepository;

    public function __construct(TimetableRepositoryInterface $matchRoundRepository)
    {
        $this->matchRoundRepository = $matchRoundRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        SEOMeta::setTitle('Terminarz');

        return view('user.season.timetable',
            [
                'matches' => $this->matchRoundRepository->getTimetable(['round', 'date', 'matches'])
            ]
        );
    }
}

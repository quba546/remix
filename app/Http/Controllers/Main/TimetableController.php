<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\TimetableRepositoryInterface;
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
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('user.season.timetable',
            [
                'matches' => $this->matchRoundRepository->getTimetable()
            ]
        );
    }
}

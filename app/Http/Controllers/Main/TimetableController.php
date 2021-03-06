<?php

namespace App\Http\Controllers\Main;

use App\CustomClasses\ReadWriteFileService;
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

        // read standing data from file
        $json = new ReadWriteFileService();
        $data = $json->read();

        return view('user.season.timetable',
            [
                'rounds' => $this->matchRoundRepository->getTimetable(
                    [
                        'round', 'date', 'matches'
                    ]),
                'league' => $data['league']
            ]
        );
    }
}

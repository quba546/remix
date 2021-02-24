<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimetableRequest;
use App\Repository\TimetableRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    private TimetableRepositoryInterface $matchRoundRepository;

    public function __construct(TimetableRepositoryInterface $matchRoundRepository)
    {
        $this->matchRoundRepository = $matchRoundRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        return view('admin.timetable');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TimetableRequest  $request
     * @return RedirectResponse
     */
    public function store(TimetableRequest $request) : RedirectResponse
    {
        $validated = $request->validated();

        $success = $this->matchRoundRepository->addRound(
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

//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}

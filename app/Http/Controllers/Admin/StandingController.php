<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\StandingRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StandingController extends Controller
{
    private StandingRepositoryInterface $standingRepository;

    public function __construct(StandingRepositoryInterface $standingRepository)
    {
        $this->standingRepository = $standingRepository;
    }

//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('admin.standings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        $standingUrl = $request->get('url');

        return $this->standingRepository->fillStanding($standingUrl)
            ? redirect()->route('admin.standing.create')->with('success', 'Poprawnie dodano dane tabeli ligowej')
            : redirect()->route('admin.standing.create')->with('error', 'Wystąpił błąd podczas dodawania danych tabeli ligowej');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy() : RedirectResponse
    {
        $this->standingRepository->deleteStanding();

        return redirect()->route('admin.standing.create')->with('warning', 'Poprawnie usunięto dane tabeli ligowej');
    }
}

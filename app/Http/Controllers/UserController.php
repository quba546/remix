<?php

namespace App\Http\Controllers;

use App\Repository\SeasonTableRepositoryInterface;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    private SeasonTableRepositoryInterface $seasonTableRepository;

    public function __construct(SeasonTableRepositoryInterface $seasonTableRepository)
    {
        $this->seasonTableRepository = $seasonTableRepository;
    }

    public function index() : View
    {
        return view('user.home',
            [
                'shortTable' => $this->seasonTableRepository->shortTable(),
            ]
        );
    }

    public function showTable() : View
    {
        return view('user.season.table',
            [
                'table' => $this->seasonTableRepository->table()
            ]
        );
    }
}

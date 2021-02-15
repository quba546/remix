<?php

namespace App\Http\Controllers;

use App\Repository\SeasonTableRepositoryInterface;

class UserController extends Controller
{
    private SeasonTableRepositoryInterface $seasonTableRepository;

    public function __construct(SeasonTableRepositoryInterface $seasonTableRepository)
    {
        $this->seasonTableRepository = $seasonTableRepository;
    }

    public function index()
    {
        return view('user.home',
            [
                'shortTable' => $this->seasonTableRepository->shortTable(),
            ]
        );
    }
}

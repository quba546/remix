<?php

declare(strict_types=1);

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Contracts\View\View;

class PlayerStatsController extends Controller
{
    private PlayerRepositoryInterface $playerRepository;

    public function __construct(PlayerRepositoryInterface $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        return view('user.season.stats',
            [
                'playersStats' => $this->playerRepository->listPaginated(15)
            ]
        );
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
}

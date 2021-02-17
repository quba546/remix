<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\UpcomingMatch;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Support\Collection;

class UpcomingMatchRepository extends BaseRepository implements UpcomingMatchRepositoryInterface
{
    private UpcomingMatch $upcomingMatchModel;

    public function __construct(UpcomingMatch $upcomingMatchModel)
    {
        $this->upcomingMatchModel = $upcomingMatchModel;
    }

    public function getUpcomingMatch() : Collection
    {
        return $this->upcomingMatchModel->with('matchType')->get();
    }

}

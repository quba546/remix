<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\UpcomingMatch;
use App\Repository\UpcomingMatchRepositoryInterface;

class UpcomingMatchRepository extends BaseRepository implements UpcomingMatchRepositoryInterface
{
    private UpcomingMatch $upcomingMatch;

    public function __construct(UpcomingMatch $upcomingMatch)
    {
        $this->upcomingMatch = $upcomingMatch;
    }

    public function getUpcomingMatch()
    {
        return $this->upcomingMatch->with('matchType')->get();
    }

}

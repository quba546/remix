<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\UpcomingMatch;
use App\Repository\UpcomingMatchRepositoryInterface;
use Illuminate\Support\Collection;

class UpcomingMatchRepository extends BaseRepository implements UpcomingMatchRepositoryInterface
{
    private UpcomingMatch $upcomingMatch;

    public function __construct(UpcomingMatch $upcomingMatch)
    {
        $this->upcomingMatch = $upcomingMatch;
    }

    public function getUpcomingMatch() : UpcomingMatch
    {
        return $this->upcomingMatch->with('matchType')->get()->first();
    }

    public function saveUpcomingMatch(array $data) : void
    {
        $this->upcomingMatch->truncate();

        $this->upcomingMatch->match_type_id = $data['matchType'];
        $this->upcomingMatch->date = $data['date'];
        $this->upcomingMatch->host = $data['host'];
        $this->upcomingMatch->guest = $data['guest'];
        $this->upcomingMatch->place = $data['place'];
        $this->upcomingMatch->round = $data['round'];

        $this->upcomingMatch->save();
    }
}

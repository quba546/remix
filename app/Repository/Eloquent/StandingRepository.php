<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\StandingRepositoryInterface;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Collection;

class StandingRepository extends BaseRepository implements StandingRepositoryInterface
{
    private Standing $standingsModel;

    public function __construct(Standing $standingsModel)
    {
        $this->standingsModel = $standingsModel;
    }

    public function shortStanding() : Collection
    {
        return $this->standingsModel
            ->all('position', 'team', 'played_matches', 'points', 'league')
            ->sortBy('position');
    }

    public function standing() : Collection
    {
        return $this->standingsModel
            ->all('position', 'team', 'played_matches', 'points', 'wins', 'draws', 'losses', 'goals_scored', 'goals_conceded', 'goals_difference', 'league')
            ->sortBy('position');
    }
}

<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\SeasonTableRepositoryInterface;
use App\Models\SeasonTable;
use Illuminate\Database\Eloquent\Collection;

class SeasonTableRepository extends BaseRepository implements SeasonTableRepositoryInterface
{
    private SeasonTable $seasonTable;

    public function __construct(SeasonTable $seasonTable)
    {
        $this->seasonTable = $seasonTable;
    }

    public function shortTable() : Collection
    {
        return $this->seasonTable
            ->all('place', 'team_name', 'played_matches', 'points', 'league_name')
            ->sortBy('place');
    }

    public function table() : Collection
    {
        return $this->seasonTable
            ->all('place', 'team_name', 'played_matches', 'points', 'wins', 'draws', 'defeats', 'goal_ratio', 'league_name')
            ->sortBy('place');
    }
}

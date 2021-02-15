<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\PlayerStats;
use App\Repository\PlayersStatsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlayersStatsRepository extends BaseRepository implements PlayersStatsRepositoryInterface
{
    private PlayerStats $playersStats;

    public function __construct(PlayerStats $playersStats)
    {
        $this->playersStats = $playersStats;
    }

    public function playersList() : Collection
    {
        return $this->playersStats->all('nr', 'first_name', 'last_name', 'position', 'goals', 'assists', 'played_matches', 'clean_sheets', 'yellow_cards', 'red_cards')
            ->sortBy('last_name');
    }

    public function shortPlayersList() : Collection
    {
        return $this->playersStats->all('nr', 'first_name', 'last_name', 'position')
            ->sortBy('last_name');
    }

    public function bestScorers(int $limit) : Collection
    {
        return $this->playersStats->all('first_name', 'last_name', 'goals')
            ->sortByDesc('goals')
            ->take($limit);
    }
}

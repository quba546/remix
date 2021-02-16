<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private Player $players;

    public function __construct(Player $players)
    {
        $this->players = $players;
    }

    public function list() : Collection
    {
        return $this->players->all( 'first_name', 'last_name', 'nr', 'position', 'goals', 'assists', 'played_matches', 'clean_sheets', 'yellow_cards', 'red_cards')
            ->sortBy('last_name');
    }

    public function shortList() : Collection
    {
        return $this->players->all('nr', 'first_name', 'last_name', 'position')
            ->sortBy('last_name');
    }

    public function bestScorers(int $limit) : Collection
    {
        return $this->players->all('first_name', 'last_name', 'goals')
            ->sortByDesc('goals')
            ->take($limit);
    }
}

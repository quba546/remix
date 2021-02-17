<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private Player $players;

    public function __construct(Player $players)
    {
        $this->players = $players;
    }

    public function shortListPaginated(int $limit) : LengthAwarePaginator
    {
        return $this->players->orderBy('last_name', 'asc')->paginate($limit, ['last_name', 'first_name', 'nr' , 'position']);
    }

    public function listPaginated(int $limit) : LengthAwarePaginator
    {
        return $this->players->orderBy('last_name', 'asc')->paginate($limit, ['first_name', 'last_name', 'nr', 'position', 'goals', 'assists', 'played_matches', 'clean_sheets', 'yellow_cards', 'red_cards']);
    }

    public function bestScorers(int $limit) : Collection
    {
        return $this->players->all('first_name', 'last_name', 'goals')
            ->sortByDesc('goals')
            ->take($limit);
    }
}

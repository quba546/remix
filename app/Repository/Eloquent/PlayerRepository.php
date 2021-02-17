<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private Player $playersModel;

    public function __construct(Player $playersModel)
    {
        $this->playersModel = $playersModel;
    }

    public function shortListPaginated(int $limit) : LengthAwarePaginator
    {
        return $this->playersModel->sortable()->paginate($limit, ['last_name', 'first_name', 'nr' , 'position']);
    }

    public function listPaginated(int $limit) : LengthAwarePaginator
    {
        return $this->playersModel->sortable()->paginate($limit, ['first_name', 'last_name', 'nr', 'position', 'goals', 'assists', 'played_matches', 'clean_sheets', 'yellow_cards', 'red_cards']);
    }

    public function bestScorers(int $limit) : Collection
    {
        return $this->playersModel->all('first_name', 'last_name', 'goals')
            ->sortByDesc('goals')
            ->take($limit);
    }
}

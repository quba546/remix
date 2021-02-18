<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private Player $player;

    public function __construct(Player $playersModel)
    {
        $this->player = $playersModel;
    }

    public function listPaginated(int $limit, array $columns) : LengthAwarePaginator
    {
        return $this->player->sortable()->paginate($limit, $columns);
    }

    public function bestScorers(int $limit) : Collection
    {
        return $this->player->all('first_name', 'last_name', 'goals')
            ->sortByDesc('goals')
            ->take($limit);
    }

    public function savePlayer(array $data) : void
    {
        $this->player->first_name = $data['firstName'];
        $this->player->last_name = $data['lastName'];
        $this->player->nr = $data['nr'];
        $this->player->position = $data['position'];

        $this->player->save();
    }
}

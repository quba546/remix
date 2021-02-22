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

    public function savePlayer(array $data) : bool
    {
        $this->player->first_name = $data['firstName'];
        $this->player->last_name = $data['lastName'];
        $this->player->nr = $data['nr'];
        $this->player->position = $data['position'];

        return $this->player->save();
    }

    public function updatePlayer(int $id, array $data) : bool
    {
        $player = $this->player->find($id);

        $player->first_name = $data['firstName'];
        $player->last_name = $data['lastName'];
        $player->nr = $data['nr'];
        $player->position = $data['position'];
        $player->goals = $data['goals'];
        $player->assists = $data['assists'];
        $player->played_matches = $data['playedMatches'];
        $player->clean_sheets = $data['cleanSheets'];
        $player->yellow_cards = $data['yellowCards'];
        $player->red_cards = $data['redCards'];
        $player->image = $data['image'];

        return $player->save();
    }

    public function playerDetails(int $id) : ?Player
    {
        return $this->player->where('id', $id)->get()->first();
    }

    public function deletePlayer(int $id) : bool
    {
        return $this->player->find($id)->delete();
    }
}

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

    public function updatePlayer(int $id, array $data) : void
    {
        $player = $this->player->find($id);

        if(isset($data['firstName'])) $player->first_name = $data['firstName'];
        if(isset($data['lastName'])) $player->last_name = $data['lastName'];
        if(isset($data['nr'])) $player->nr = $data['nr'];
        if(isset($data['position'])) $player->position = $data['position'];
        if(isset($data['goals'])) $player->goals = $data['goals'];
        if(isset($data['assists'])) $player->assists = $data['assists'];
        if(isset($data['playedMatches'])) $player->played_matches = $data['playedMatches'];
        if(isset($data['cleanSheets'])) $player->clean_sheets = $data['cleanSheets'];
        if(isset($data['yellowCards'])) $player->yellow_cards = $data['yellowCards'];
        if(isset($data['redCards'])) $player->red_cards = $data['redCards'];

        $player->save();
    }

    public function playerDetails(int $id) : Collection
    {
        return $this->player->where('id', $id)->get();
    }

    public function deletePlayer(int $id) : bool
    {
        return $this->player->find($id)->delete();
    }
}

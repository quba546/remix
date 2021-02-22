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
        return $this->player
            ->sortable()
            ->paginate($limit, $columns);
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
         return (bool) $this->player
            ->where('id', $id)
            ->update(
                [
                    'first_name' => $data['firstName'],
                    'last_name' => $data['lastName'],
                    'nr' => $data['nr'],
                    'position' => $data['position'],
                    'goals' => $data['goals'],
                    'assists' => $data['assists'],
                    'played_matches' => $data['playedMatches'],
                    'clean_sheets' => $data['cleanSheets'],
                    'yellow_cards' => $data['yellowCards'],
                    'red_cards' => $data['redCards'],
                    'image' => $data['image']
                ]
            );
    }

    public function deletePlayerImage(int $id) : bool
    {
        return (bool) $this->player
            ->where('id', $id)
            ->update(['image' => NULL]);
    }

    public function playerDetails(int $id) : ?Player
    {
        return $this->player
            ->where('id', $id)
            ->get()
            ->first();
    }

    public function deletePlayer(int $id) : bool
    {
        return $this->player
            ->findOrFail($id)
            ->delete();
    }
}

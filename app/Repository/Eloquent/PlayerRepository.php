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

    public function listPaginated(int $limit, array $columns): LengthAwarePaginator
    {
        return $this->player
            ->sortable()
            ->paginate($limit, $columns);
    }

    public function playersList(array $columns, string $position) : Collection
    {
        return $this->player
            ->where('position', '=', $position)
            ->get($columns)
            ->sortBy('last_name');
    }

    public function bestScorers(int $limit): array
    {
        $bestScorers = $this->player->all('first_name', 'last_name', 'goals', 'image')
            ->sortByDesc('goals')
            ->take($limit)
            ->toArray();

        $result = [];
        foreach ($bestScorers as $bestScorer) {
            $result[] = $bestScorer;
        }

        return $result;
    }

    public function savePlayer(array $data): bool
    {
        $this->player->first_name = $data['firstName'];
        $this->player->last_name = $data['lastName'];
        $this->player->nr = $data['nr'];
        $this->player->position = $data['position'];

        return $this->player->save();
    }

    public function updatePlayer(int $id, array $data): bool
    {
        return $this->player
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

    public function updatePlayerDefaults(int $id): bool
    {
        return $this->player
            ->where('id', $id)
            ->update(
                [
                    'goals' => 0,
                    'assists' => 0,
                    'played_matches' => 0,
                    'clean_sheets' => 0,
                    'yellow_cards' => 0,
                    'red_cards' => 0,
                ]
            );
    }

    public function updatePlayedMatches(int $id, int $playedMatches): bool
    {
        return $this->player
            ->where('id', $id)
            ->update(['played_matches' => $playedMatches]);
    }

    public function deletePlayerImage(int $id): bool
    {
        return $this->player
            ->where('id', $id)
            ->update(['image' => NULL]);
    }

    public function playerDetails(int $id): ?Player
    {
        return $this->player
            ->where('id', $id)
            ->get()
            ->first();
    }

    public function deletePlayer(int $id): ?bool
    {
        /** @noinspection PhpUnhandledExceptionInspection */
        return $this->player
            ->findOrFail($id)
            ->delete();
    }
}

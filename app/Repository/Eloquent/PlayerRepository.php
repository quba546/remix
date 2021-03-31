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

    public function playersListPaginated(array $columns, int $limit = 15): LengthAwarePaginator
    {
        return $this->player
            ->sortable()
            ->paginate($limit, $columns)
            ?? LengthAwarePaginator::empty();
    }

    public function playersList(array $columns, string $position) : Collection
    {
        return $this->player
            ->where('position', $position)
            ->get($columns)
            ->sortBy('last_name')
            ?? Collection::empty();
    }

    public function getBestScorers(int $limit): Collection
    {
        return $this->player
            ->orderByDesc('goals')
            ->take(3)
            ->get(['first_name', 'last_name', 'goals', 'image'])
            ?? Collection::empty();
    }

    public function savePlayer(array $data): void
    {
        $this->player->create(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'nr' => $data['nr'],
                'position' => $data['position']
            ]
        );
    }

    public function updatePlayerDetails(int $id, array $data): void
    {
        $this->player
            ->where('id', $id)
            ->update(
                [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'nr' => $data['nr'],
                    'position' => $data['position'],
                    'goals' => $data['goals'],
                    'assists' => $data['assists'],
                    'played_matches' => $data['played_matches'],
                    'clean_sheets' => $data['clean_sheets'],
                    'yellow_cards' => $data['yellow_cards'],
                    'red_cards' => $data['red_cards'],
                    'image' => $data['image']
                ]
            );
    }

    public function updatePlayerDefaults(int $id): void
    {
        $this->player
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

    public function updatePlayedMatches(int $id, int $playedMatches): void
    {
        $this->player
            ->where('id', $id)
            ->update(['played_matches' => $playedMatches]);
    }

    public function deletePlayerImage(int $id): void
    {
        $this->player
            ->where('id', $id)
            ->update(['image' => null]);
    }

    public function playerDetails(int $id): Player
    {
        return $this->player
            ->where('id', $id)
            ->firstOrFail();
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function deletePlayer(int $id): void
    {
        $playerToDelete = $this->player->findOrFail($id);

        $playerToDelete->delete();
    }
}

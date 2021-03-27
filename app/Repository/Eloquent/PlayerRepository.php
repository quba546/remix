<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\Player;
use App\Repository\PlayerRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use \Exception;

class PlayerRepository extends BaseRepository implements PlayerRepositoryInterface
{
    private Player $player;

    public function __construct(Player $playersModel)
    {
        $this->player = $playersModel;
    }

    public function listPaginated(int $limit, array $columns): LengthAwarePaginator
    {
        try {
            return $this->player
                ->sortable()
                ->paginate($limit, $columns);
        } catch (Exception $e) {

            return LengthAwarePaginator::empty();
        }
    }

    public function playersList(array $columns, string $position) : Collection
    {
        try {
            return $this->player
                ->where('position', $position)
                ->get($columns)
                ->sortBy('last_name');
        } catch (Exception $e) {

            return Collection::empty();
        }
    }

    public function bestScorers(int $limit): Collection
    {
        try {
            return $this->player
                ->orderByDesc('goals')
                ->take(3)
                ->get(['first_name', 'last_name', 'goals', 'image']);
        } catch (Exception $e) {

            return Collection::empty();
        }
    }

    public function savePlayer(array $data): bool
    {
        try {
            $this->player->create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'nr' => $data['nr'],
                'position' => $data['position']
            ]);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updatePlayer(int $id, array $data): bool
    {
        try {
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

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updatePlayerDefaults(int $id): bool
    {
        try {
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

            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function updatePlayedMatches(int $id, int $playedMatches): bool
    {
        try {
            $this->player
                ->where('id', $id)
                ->update(['played_matches' => $playedMatches]);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function deletePlayerImage(int $id): bool
    {
        try {
            $this->player
                ->where('id', $id)
                ->update(['image' => null]);

            return true;
        } catch (Exception $e) {

            return false;
        }
    }

    public function playerDetails(int $id): ?Player
    {
        return $this->player
            ->where('id', $id)
            ->firstOrFail();
    }

    public function deletePlayer(int $id): bool
    {
        $playerToDelete = $this->player->findOrFail($id);

        try {
            $playerToDelete->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

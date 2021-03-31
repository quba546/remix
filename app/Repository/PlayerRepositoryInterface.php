<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    public function playersListPaginated(array $columns, int $limit = 15): LengthAwarePaginator;

    public function playersList(array $columns, string $position) : Collection;

    public function getBestScorers(int $limit): Collection;

    public function savePlayer(array $data): void;

    public function updatePlayerDetails(int $id, array $data): void;

    public function updatePlayerDefaults(int $id): void;

    public function updatePlayedMatches(int $id, int $playedMatches): void;

    public function deletePlayerImage(int $id): void;

    public function playerDetails(int $id): Player;

    public function deletePlayer(int $id): void;
}

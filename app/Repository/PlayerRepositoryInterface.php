<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Player;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    public function listPaginated(int $limit, array $columns): LengthAwarePaginator;

    public function playersList(array $columns, string $position) : Collection;

    public function bestScorers(int $limit): array;

    public function savePlayer(array $data): bool;

    public function updatePlayer(int $id, array $data): bool|int;

    public function updatePlayedMatches(int $id, int $playedMatches): bool;

    public function deletePlayerImage(int $id): bool|int;

    public function playerDetails(int $id): ?Player;

    public function deletePlayer(int $id): ?bool;
}

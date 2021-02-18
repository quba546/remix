<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    public function listPaginated(int $limit, array $columns) : LengthAwarePaginator;
    public function bestScorers(int $limit) : Collection;
    public function savePlayer(array $data) : void;
}

<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PlayerRepositoryInterface
{
    public function shortListPaginated(int $limit) : LengthAwarePaginator;
    public function listPaginated(int $limit) : LengthAwarePaginator;
    public function bestScorers(int $limit) : Collection;
}

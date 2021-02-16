<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface PlayerRepositoryInterface
{
    public function list() : Collection;
    public function shortList() : Collection;
    public function bestScorers(int $limit) : Collection;
}

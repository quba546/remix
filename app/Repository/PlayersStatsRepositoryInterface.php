<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface PlayersStatsRepositoryInterface
{
    public function playersList() : Collection;
    public function shortPlayersList() : Collection;
    public function bestScorers(int $limit) : Collection;
}

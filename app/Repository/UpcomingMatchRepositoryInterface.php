<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Support\Collection;

interface UpcomingMatchRepositoryInterface
{
    public function getUpcomingMatch() : Collection;
    public function saveUpcomingMatch(array $data) : void;
}

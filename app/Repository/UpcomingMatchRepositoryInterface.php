<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\UpcomingMatch;

interface UpcomingMatchRepositoryInterface
{
    public function getUpcomingMatch() : UpcomingMatch;
    public function saveUpcomingMatch(array $data) : void;
}

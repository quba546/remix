<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\UpcomingMatch;

interface UpcomingMatchRepositoryInterface
{
    public function get(): ?UpcomingMatch;

    public function save(array $data): void;
}

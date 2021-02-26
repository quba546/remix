<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface StandingRepositoryInterface
{
    public function standing(array $columns): Collection;

    public function fillStanding(string $url): bool;

    public function deleteStanding(): void;
}

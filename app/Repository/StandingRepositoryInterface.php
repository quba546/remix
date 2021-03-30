<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface StandingRepositoryInterface
{
    public function get(array $columns): Collection;

    public function fillStanding(string $url, int $numberOfPromotionTeams, int $numberOfRelegationTeams): void;

    public function clearStanding(): void;
}

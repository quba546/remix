<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface MatchTypeRepositoryInterface
{
    public function getMatchTypes(): Collection;
}

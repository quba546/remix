<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Standing;
use Illuminate\Database\Eloquent\Collection;

interface StandingRepositoryInterface
{
    public function shortStanding() : Collection;
    public function standing() : Collection;
}

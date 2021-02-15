<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\SeasonTable;
use Illuminate\Database\Eloquent\Collection;

interface SeasonTableRepositoryInterface
{
    public function shortTable() : Collection;
    public function table() : Collection;
}

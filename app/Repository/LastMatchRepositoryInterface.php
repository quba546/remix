<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\LastMatch;

interface LastMatchRepositoryInterface
{
    public function get(): ?LastMatch;

    public function save(array $data): bool;
}

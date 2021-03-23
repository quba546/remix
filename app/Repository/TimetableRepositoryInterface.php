<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface TimetableRepositoryInterface
{
    const INVALID_MATCHES_NUMBER = 4;

    public function addRound(array $data): bool;

    public function getTimetable(): Collection;

    public function getRounds(): Collection;

    public function deleteRound(int $round): bool;

    public function deleteAll(): void;
}

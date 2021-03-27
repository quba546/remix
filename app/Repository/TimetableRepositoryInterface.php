<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface TimetableRepositoryInterface
{
    public function saveRound(array $data): bool;

    public function getTimetable(array $columns): Collection;

    public function deleteRound(int $round): void;

    public function clearTimetable(): void;
}

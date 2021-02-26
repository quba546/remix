<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;

interface TimetableRepositoryInterface
{
    public function addRound(array $data) : bool;
    public function getTimetable() : array;
    public function getRounds() : Collection;
    public function deleteRound(int $round) : bool;
    public function deleteAll() : bool;
}

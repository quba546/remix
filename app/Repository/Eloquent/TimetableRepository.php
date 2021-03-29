<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\CustomClasses\ParseTimetable;
use App\Models\Timetable;
use App\Repository\TimetableRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TimetableRepository extends BaseRepository implements TimetableRepositoryInterface
{
    private Timetable $timetable;

    public function __construct(Timetable $timetable)
    {
        $this->timetable = $timetable;
    }

    public function saveRound(array $data): bool
    {
        if (!$this->timetable->where('round', $data['round'])->exists()) {
            $this->timetable->create(
                [
                    'round' => $data['round'],
                    'date' => $data['date'],
                    'matches' => $data['matches']
                ]
            );

            return true;
        }

        return false;
    }

    public function getTimetable(array $columns): Collection
    {
        $results = $this->timetable->all($columns);

        if (in_array('matches', $columns)) {
            $results = (new ParseTimetable())->parseMatchesFromDatabase($results);
        }

        return $results ?? Collection::empty();
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function deleteRound(int $round): void
    {
        $this->timetable
            ->where('round', $round)
            ->delete();
    }

    public function clearTimetable(): void
    {
        $this->timetable->truncate();
    }
}

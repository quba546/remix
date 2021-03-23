<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\Timetable;
use App\Repository\TimetableRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use \Exception;

class TimetableRepository extends BaseRepository implements TimetableRepositoryInterface
{
    private Timetable $timetable;

    public function __construct(Timetable $timetable)
    {
        $this->timetable = $timetable;
    }

    public function addRound(array $data): bool
    {
        try {
            if (!$this->timetable->where('round', $data['round'])->exists()) {
                $this->timetable->create([
                    'round' => $data['round'],
                    'date' => $data['date'],
                    'details' => $data['matches']
                ]);

                return true;
            } else {
                return false;
            }
        } catch(Exception $e) {

            return false;
        }
    }

    public function getTimetable(): Collection
    {
        try {
            $data = $this->timetable->all();

            $result = [];
            foreach ($data as $i => $row) {
                $matches = explode("\r\n", $data[$i]->details); // split text before "\r\n" sign
                $matchDetails = [];
                foreach ($matches as $j => $match) {
                    $matchDetails[] = explode("\t", $match); // split line before "\t" sign
                    if (count($matchDetails[$j]) <= 2) {  // if array has less then 3 values
                        unset($matchDetails[$j]); // delete this value
                    }
                }
                $matchDetails[] = $data[$i]->round; // add round to array
                $matchDetails[] = $data[$i]->date;  // add date to array
                $result[] = array_values($matchDetails);    // reindex array after deleting
            }

            foreach ($result as $value) {
                if (count($value) < self::INVALID_MATCHES_NUMBER) {
                    $result = [];
                    break;
                }
            }

            return $result = Collection::make($result);
        } catch (Exception $e) {
            return Collection::empty();
        }
    }

    public function getRounds(): Collection
    {
        try {
            return $this->timetable->all('round', 'date');
        } catch (Exception $e) {
            return Collection::empty();
        }
    }

    public function deleteRound(int $round): bool
    {
        try {
            $this->timetable
                ->where('round', $round)
                ->delete();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function deleteAll(): void
    {
        try {
            $this->timetable->truncate();
        } catch (Exception $e) {
            //
        }
    }
}

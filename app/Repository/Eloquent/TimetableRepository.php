<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\Timetable;
use App\Repository\TimetableRepositoryInterface;

class TimetableRepository extends BaseRepository implements TimetableRepositoryInterface
{
    private Timetable $timetable;

    public function __construct(Timetable $timetable)
    {
        $this->timetable = $timetable;
    }

    public function addRound(array $data) : bool
    {
        // check if that round exists yet in table
        if (!$this->timetable->where('round', $data['round'])->exists()) {
            $this->timetable->round = $data['round'];
            $this->timetable->date = $data['date'];
            $this->timetable->details = $data['matches'];

            return $this->timetable->save();
        } else {

            return false;
        }
    }

    public function getTimetable() : array
    {
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
            if (count($value) < 9) {
                $result = [];
                break;
            }
        }

        return $result;
    }
}

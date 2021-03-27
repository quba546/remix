<?php

declare(strict_types=1);

namespace App\Custom;

use Illuminate\Database\Eloquent\Collection;

class ParseTimetable
{
    const INVALID_MATCHES_NUMBER = 4;

    public function parseText(Collection $data): Collection
    {
        $result = [];

        foreach ($data as $i => $row) {
            $matches = explode("\r\n", $data[$i]->matches); // split text before "\r\n" sign
            $allMatchesInEachRound = [];
            foreach ($matches as $j => $match) {
                $allMatchesInEachRound[] = explode("\t", $match); // split line before "\t" sign
                if (count($allMatchesInEachRound[$j]) <= 2) {  // if array has less then 3 values
                    unset($allMatchesInEachRound[$j]); // delete this value
                }
            }
            $allMatchesInEachRound[] = $data[$i]->round; // add round to array
            $allMatchesInEachRound[] = $data[$i]->date;  // add date to array
            $result[] = array_values($allMatchesInEachRound);    // reindex array after deleting
        }

        foreach ($result as $value) {
            if (count($value) < self::INVALID_MATCHES_NUMBER) {
                $result = [];
                break;
            }
        }

        return $result = Collection::make($result);
    }
}

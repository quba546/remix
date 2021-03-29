<?php

declare(strict_types=1);

namespace App\CustomClasses;

use Illuminate\Database\Eloquent\Collection;
use \Exception;

class ParseTimetable
{
    /**
     * @param string $data
     * @return string
     * @throws Exception
     */
    public function parseMatchesFromUrl(string $data): string
    {
        // check if passed data if valid if not throw an exception
        if (strpos($data, "\r\n") && strpos($data, "\t")) {
            // replace special characters in string
            $matches = str_replace(["\t", "\r\n", "\""], ["|", "\n", ""], $data);

            // add new line character at the end of each line to simplify later exploding
            $matches = $matches . "\n";

            return $matches;
        }

        throw new Exception('The specified string does not contain the required special characters');
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    public function parseMatchesFromDatabase(Collection $collection): Collection
    {
        $array = $collection->toArray();
        foreach ($array as $index => $element) {
            $element['matches'] = explode("\n", $element['matches']);
            array_pop($element['matches']);
            foreach ($element['matches'] as $key => $match) {
                $element['matches'][$key] = explode("|", $match);
            }
            $array[$index]['matches'] = $element['matches'];
        }

        return Collection::make($array);
    }
}

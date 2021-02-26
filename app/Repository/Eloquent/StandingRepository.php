<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\StandingRepositoryInterface;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Collection;
use KubAT\PhpSimple\HtmlDomParser;

class StandingRepository extends BaseRepository implements StandingRepositoryInterface
{
    private Standing $standing;

    public function __construct(Standing $standing)
    {
        $this->standing = $standing;
    }

    public function standing(array $columns): Collection
    {
        return $this->standing
            ->all($columns)
            ->sortBy('position');
    }

    public function fillStanding(string $url): bool
    {
        $dom = HtmlDomParser::str_get_html(file_get_contents($url));

        $temp_result = [];
        $result = [];

        // conditions to count how many teams are in table
        if (!empty($dom)) {
            $i = 0;
            foreach ($dom->find('table.main2') as $tdClass) {
                foreach ($tdClass->find('td b') as $temp_desc) {
                    $temp_text = html_entity_decode($temp_desc->plaintext);
                    $temp_text = preg_replace('/\&#39;/', "'", $temp_text);
                    $temp_text = rtrim($temp_text, '.');
                    $temp_result[$i] = html_entity_decode($temp_text);
                    $i++;
                }
            }
        }

        $teamsNumber = (int)(count($temp_result) - 26) / 2;
        $colsNumber = 22;
        $offset = 28;

        // condition to get data from table
        if (!empty($dom)) {
            $i = 0;
            foreach ($dom->find('table.main2') as $tdClass) {
                foreach ($tdClass->find('td') as $desc) {
                    $text = html_entity_decode($desc->plaintext);
                    $text = preg_replace('/\&#39;/', "'", $text);
                    $text = rtrim($text, '.');
                    $result[$i] = html_entity_decode($text);
                    $i++;
                }
            }
        }

        $this->standing->truncate();    // truncate table before save data

        $data = [];
        // save data to table
        for ($i = 29; $i <= ($teamsNumber * $colsNumber + $offset); $i++) {

            $goalsScored = explode('-', $result[$i + 7])[0];
            $goalsConceded = explode('-', $result[$i + 7])[1];

            $data[] = [
                'league' => $result[0],
                'position' => (int)$result[$i],
                'team' => $result[$i + 1],
                'played_matches' => (int)$result[$i + 2],
                'points' => (int)$result[$i + 3],
                'wins' => (int)$result[$i + 4],
                'draws' => (int)$result[$i + 5],
                'losses' => (int)$result[$i + 6],
                'goals_scored' => (int)$goalsScored,
                'goals_conceded' => (int)$goalsConceded,
                'goals_difference' => (int)$goalsScored - $goalsConceded
            ];

            $i = $i + 21;
        }

        return $this->standing->insert($data);
    }

    public function deleteStanding(): void
    {
        $this->standing->truncate();
    }
}

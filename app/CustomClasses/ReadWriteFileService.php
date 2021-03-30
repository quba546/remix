<?php

declare(strict_types=1);

namespace App\CustomClasses;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class ReadWriteFileService
{
    /** @noinspection PhpUnhandledExceptionInspection */
    public function write(string $league = '', int $promotionTeams = 1, int $relegationTeams = 0): void
    {
        if (Storage::disk('local')->exists('data/timetable.json')) {
            $file = Storage::disk('local')->get('data/timetable.json');

            $data = json_decode($file, true);

            $data['league'] = $league;
            $data['numberOfPromotionTeams'] = $promotionTeams;
            $data['numberOfRelegationTeams'] = $relegationTeams;

            Storage::disk('local')->put('data/timetable.json', json_encode($data));
        } else {
            $data = [
                'league' => $league,
                'numberOfPromotionTeams' => $promotionTeams,
                'numberOfRelegationTeams' => $relegationTeams
            ];

            Storage::disk('local')->put('data/timetable.json', json_encode($data));
        }
    }

    public function read(): array
    {
        try {
            $file = Storage::disk('local')->get('data/timetable.json');

            return json_decode($file, true);
        } catch (FileNotFoundException $e) {
            return [
                'league' => '',
                'numberOfPromotionTeams' => 1,
                'numberOfRelegationTeams' => 0
            ];
        }
    }
}

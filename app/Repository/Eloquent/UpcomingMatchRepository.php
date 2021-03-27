<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\UpcomingMatch;
use App\Repository\UpcomingMatchRepositoryInterface;

class UpcomingMatchRepository extends BaseRepository implements UpcomingMatchRepositoryInterface
{
    private UpcomingMatch $upcomingMatch;

    public function __construct(UpcomingMatch $upcomingMatch)
    {
        $this->upcomingMatch = $upcomingMatch;
    }

    public function get(): ?UpcomingMatch
    {
        return $this->upcomingMatch
            ->with('matchType')
            ->get()
            ->first();
    }

    public function save(array $data): void
    {

        $this->upcomingMatch->truncate();

        $this->upcomingMatch->create(
            [
                'match_type_id' => $data['matchType'],
                'date' => $data['date'],
                'host' => $data['host'],
                'guest' => $data['guest'],
                'place' => $data['place'],
                'round' => $data['round']
            ]
        );
    }
}

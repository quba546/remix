<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Models\LastMatch;
use App\Repository\LastMatchRepositoryInterface;

class LastMatchRepository extends BaseRepository implements LastMatchRepositoryInterface
{
    private LastMatch $lastMatch;

    public function __construct(LastMatch $lastMatch)
    {
        $this->lastMatch = $lastMatch;
    }

    public function get(): ?LastMatch
    {
        return $this->lastMatch
            ->with('matchType')
            ->get()
            ->first();
    }

    public function save(array $data): void
    {
        $this->lastMatch->truncate();

        $this->lastMatch->create(
            [
                'match_type_id' => $data['match_type_id'],
                'date' => $data['date'],
                'host' => $data['host'],
                'guest' => $data['guest'],
                'score' => $data['score'],
                'round' => $data['round']
            ]
        );
    }
}

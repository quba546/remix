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

    public function getLastMatch(): ?LastMatch
    {
        return $this->lastMatch
            ->with('matchType')
            ->get()
            ->first();
    }

    public function saveLastMatch(array $data): bool
    {
        $this->lastMatch->truncate();

        $this->lastMatch->match_type_id = $data['matchType'];
        $this->lastMatch->date = $data['date'];
        $this->lastMatch->host = $data['host'];
        $this->lastMatch->guest = $data['guest'];
        $this->lastMatch->score = $data['score'];
        $this->lastMatch->round = $data['round'];

        return $this->lastMatch->save();
    }
}

<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\LastMatch;
use App\Repository\LastMatchRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class LastMatchRepository extends BaseRepository implements LastMatchRepositoryInterface
{
    private LastMatch $lastMatch;

    public function __construct(LastMatch $lastMatch)
    {
        $this->lastMatch = $lastMatch;
    }

    public function lastMatchDetails() : Collection
    {
        return $this->lastMatch->with('matchTypes')->get();
    }
}

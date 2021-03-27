<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\MatchType;
use App\Repository\MatchTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class MatchTypeRepository extends BaseRepository implements MatchTypeRepositoryInterface
{
    private MatchType $matchType;

    public function __construct(MatchType $matchType)
    {
        $this->matchType = $matchType;
    }

    public function getMatchTypes(): Collection
    {
        return $this->matchType->all() ?? Collection::empty();
    }
}

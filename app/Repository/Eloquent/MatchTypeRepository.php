<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\MatchType;
use App\Repository\MatchTypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use \Exception;

class MatchTypeRepository extends BaseRepository implements MatchTypeRepositoryInterface
{
    private MatchType $matchType;

    public function __construct(MatchType $matchType)
    {
        $this->matchType = $matchType;
    }

    public function getMatchTypes(): Collection
    {
        try {
            return $this->matchType->all();
        } catch (Exception $e) {

            return Collection::empty();
        }
    }
}

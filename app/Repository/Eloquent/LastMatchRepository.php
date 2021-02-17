<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\LastMatch;
use App\Repository\LastMatchRepositoryInterface;
use Illuminate\Support\Collection;

class LastMatchRepository extends BaseRepository implements LastMatchRepositoryInterface
{
    private LastMatch $lastMatchModel;

    public function __construct(LastMatch $lastMatchModel)
    {
        $this->lastMatchModel = $lastMatchModel;
    }

    public function getLastMatch() : Collection
    {
        return $this->lastMatchModel->with('matchType')->get();
    }
}

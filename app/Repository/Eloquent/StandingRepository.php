<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Custom\GetStandingFromUrl;
use App\Repository\StandingRepositoryInterface;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Collection;

class StandingRepository extends BaseRepository implements StandingRepositoryInterface
{
    private Standing $standing;

    public function __construct(Standing $standing)
    {
        $this->standing = $standing;
    }

    public function get(array $columns): Collection
    {
        return $this->standing
            ->all($columns)
            ->sortBy('position')
            ?? Collection::empty();
    }

    public function fillStanding(string $url): void
    {
        $getStandingFromUrl = new GetStandingFromUrl();
        $result = $getStandingFromUrl->getStanding($url);

        $this->standing->truncate();    // truncate table before save data

        $this->standing->insert($result);
    }

    public function clearStanding(): void
    {
        $this->standing->truncate();
    }
}

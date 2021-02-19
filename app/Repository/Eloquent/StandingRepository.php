<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;

use App\Repository\StandingRepositoryInterface;
use App\Models\Standing;
use Illuminate\Database\Eloquent\Collection;
use Sunra\PhpSimple\HtmlDomParser;

class StandingRepository extends BaseRepository implements StandingRepositoryInterface
{
    private Standing $standing;

    public function __construct(Standing $standing)
    {
        $this->standing = $standing;
    }

    public function standing(array $columns) : Collection
    {
        return $this->standing
            ->all($columns)
            ->sortBy('position');
    }

    public function fillStanding(string $url)
    {
        //$dom = HtmlDomParser::str_get_html($url);
        //$dom = HtmlDomParser::str_get_html($url);
        //dd($dom);
    }
}

<?php

declare(strict_types=1);

namespace App\Repository;


use Illuminate\Support\Collection;

interface LastMatchRepositoryInterface
{
    public function getLastMatch() : Collection;
}

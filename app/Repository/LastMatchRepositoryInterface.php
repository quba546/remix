<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\LastMatch;

interface LastMatchRepositoryInterface
{
    public function getLastMatch() : LastMatch;
    public function saveLastMatch(array $data) : void;
}

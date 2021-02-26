<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Standing extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'team',
        'played_matches',
        'points',
        'wins',
        'draws',
        'losses',
        'goals_scored',
        'goals_conceded',
        'goals_difference',
        'league'
    ];

    protected $attributes = [
        'wins' => 0,
        'draws' => 0,
        'losses' => 0,
        'goals_scored' => 0,
        'goals_conceded' => 0,
        'goals_difference' => 0,
        'league' => ''
    ];
}

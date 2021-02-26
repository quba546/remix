<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Builder
 */
class MatchType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function lastMatch(): BelongsTo
    {
        return $this->belongsTo(LastMatch::class, 'match_type_id', 'id');
    }

    public function upcomingMatch(): BelongsTo
    {
        return $this->belongsTo(UpcomingMatch::class, 'match_type_id', 'id');
    }
}

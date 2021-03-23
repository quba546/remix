<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @mixin Builder
 */
class LastMatch extends Model
{
    use HasFactory;

    protected $table = 'last_match';

    protected $fillable = [
        'match_type_id',
        'date',
        'host',
        'guest',
        'score',
        'round'
    ];

    public function matchType(): HasOne
    {
        return $this->hasOne(MatchType::class, 'id', 'match_type_id');
    }
}

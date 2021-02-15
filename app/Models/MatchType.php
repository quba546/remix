<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatchType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function lastMatch() : BelongsTo
    {
        return $this->belongsTo(LastMatch::class, 'match_type_id');
    }
}

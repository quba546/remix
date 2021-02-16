<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MatchType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function lastMatch()
    {
        return $this->belongsTo(LastMatch::class, 'match_type_id');
    }
}

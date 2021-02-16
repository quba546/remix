<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchType extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function lastMatch()
    {
        return $this->belongsTo(LastMatch::class, 'match_type_id', 'id');
    }

    public function upcomingMatch()
    {
        return $this->belongsTo(UpcomingMatch::class, 'match_type_id', 'id');
    }
}

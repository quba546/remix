<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastMatch extends Model
{
    use HasFactory;

    protected $table = 'last_match';

    public function matchType()
    {
        return $this->hasOne(MatchType::class, 'id', 'match_type_id');
    }
}

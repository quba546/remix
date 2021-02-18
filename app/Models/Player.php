<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use HasFactory;
    use Sortable;

    protected $attributes = [
        'goals' => 0,
        'assists' => 0,
        'played_matches' => 0,
        'clean_sheets' => 0,
        'yellow_cards' => 0,
        'red_cards' => 0
    ];

    public $sortable = [
        'last_name',
        'first_name',
        'position',
        'goals',
        'assists',
        'clean_sheets',
        'yellow_cards',
        'red_cards',
        'played_matches',
        'updated_at'
    ];
}

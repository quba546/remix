<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use HasFactory;
    use Sortable;
    use SoftDeletes;

    protected $attributes = [
        'goals' => 0,
        'assists' => 0,
        'played_matches' => 0,
        'clean_sheets' => 0,
        'yellow_cards' => 0,
        'red_cards' => 0,
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'nr',
        'position',
        'goals',
        'assists',
        'played_matches',
        'clean_sheets',
        'yellow_cards',
        'red_cards',
        'image',
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

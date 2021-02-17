<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Player extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = [
        'last_name',
        'first_name',
        'position',
        'goals',
        'assists',
        'clean_sheets',
        'yellow_cards',
        'red_cards',
        'played_matches'
    ];
}

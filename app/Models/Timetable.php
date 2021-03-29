<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */
class Timetable extends Model
{
    use HasFactory;

    protected $table = 'timetable';

    protected $fillable = [
        'round',
        'date',
        'matches'
    ];
}

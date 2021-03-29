<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GalleryPhoto
 * @package App\Models
 * @mixin Builder
 */
class GalleryPhoto extends Model
{
    use HasFactory;

    protected $table = 'gallery_photos';
}

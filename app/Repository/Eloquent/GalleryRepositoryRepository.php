<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\GalleryPhoto;
use App\Repository\GalleryRepositoryInterface;

class GalleryRepositoryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    private GalleryPhoto $galleryPhoto;

    public function __construct(GalleryPhoto $galleryPhoto)
    {
        $this->galleryPhoto = $galleryPhoto;
    }

    public function savePhoto(string $filename): void
    {
        $this->galleryPhoto->filename = $filename;
        $this->galleryPhoto->save();
    }
}

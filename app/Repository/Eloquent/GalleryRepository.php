<?php

declare(strict_types=1);

namespace App\Repository\Eloquent;


use App\Models\GalleryPhoto;
use App\Repository\GalleryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
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

    public function getPhotos(array $columns): Collection
    {
        return $this->galleryPhoto
            ->orderByDesc('created_at')
            ->get($columns)
            ?? Collection::empty();
    }

    public function getPhoto(int $id, array $columns): GalleryPhoto
    {
        return $this->galleryPhoto->where('id', $id)->firstOrFail($columns);
    }

    public function deletePhoto(int $id): void
    {
        $this->galleryPhoto->where('id', $id)->delete();
    }
}

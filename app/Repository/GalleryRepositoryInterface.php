<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\GalleryPhoto;
use Illuminate\Database\Eloquent\Collection;

interface GalleryRepositoryInterface
{
    public function savePhoto(string $filename): void;

    public function getPhotos(array $columns): Collection;

    public function getPhoto(int $id, array $columns): GalleryPhoto;

    public function deletePhoto(int $id): void;
}

<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\GalleryPhoto;
use Illuminate\Pagination\LengthAwarePaginator;

interface GalleryRepositoryInterface
{
    public function savePhoto(string $filename): void;

    public function getPhotosPaginated(array $columns, int $limit = 16): LengthAwarePaginator;

    public function getPhoto(int $id, array $columns): GalleryPhoto;

    public function deletePhoto(int $id): void;
}

<?php

declare(strict_types=1);

namespace App\Repository;


interface GalleryRepositoryInterface
{
    public function savePhoto(string $filename): void;
}

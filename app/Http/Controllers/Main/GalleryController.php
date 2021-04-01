<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\GalleryRepositoryInterface;

class GalleryController extends Controller
{
    private GalleryRepositoryInterface $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function __invoke()
    {
        return view('user.gallery', ['photos' => $this->galleryRepository->getPhotosPaginated(['path'])]);
    }
}

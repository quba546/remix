<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Repository\GalleryRepositoryInterface;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    private GalleryRepositoryInterface $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * @throws \Exception
     */
    public function __invoke()
    {
        $photos = Cache::remember('user-gallery', now()->addSeconds(120), function () {
            //dd('test');
            return $this->galleryRepository->getPhotosPaginated(['path']);
        });

        return view('user.gallery', ['photos' => $photos]);
    }
}

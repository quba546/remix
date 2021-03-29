<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\UploadPhoto;
use App\Http\Controllers\Controller;
use App\Repository\GalleryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class GalleryController extends Controller
{
    private GalleryRepositoryInterface $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.photos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        if (isset($request->uploadedPhoto)) {
            $uploadPhoto = new UploadPhoto();
            $filename = $uploadPhoto->savePhotoToGallery($request->uploadedPhoto);
            $this->galleryRepository->savePhoto($filename);
            $message = [
                'status' => 'success',
                'message' => "Poprawnie dodano nowe zdjęcie do galerii"
            ];
        } else {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd podczas dodawnia zdjęcia do galerii"
            ];
        }

        return redirect()
            ->route('admin.photos.create')
            ->with($message['status'], $message['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

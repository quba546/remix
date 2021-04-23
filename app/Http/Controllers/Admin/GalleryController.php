<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Repository\GalleryRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use \Exception;

class GalleryController extends Controller
{
    private GalleryRepositoryInterface $galleryRepository;

    public function __construct(GalleryRepositoryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    public function create(): View
    {
        Gate::authorize('moderator-level');

        return view('admin.photos',
            ['photos' => $this->galleryRepository->getPhotosPaginated(
                [
                    'id',
                    'path',
                    'created_at'
                ])
            ]);
    }

    public function store(PhotoRequest $request): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $validated = $request->validated();

        try {
            $originalPath = Storage::putFile('public/photos', $validated['image']); // add new player image to storage
            $path = str_replace('public/', '', $originalPath);

            $this->galleryRepository->savePhoto([
                'path' => $path,
                'description' => $validated['description'] ?? null
            ]);

            Cache::forget('user-gallery');

            $message = [
                'status' => 'success',
                'message' => "Poprawnie dodano nowe zdjęcie do galerii"
            ];
        } catch (Exception $e) {
            $message = [
                'status' => 'error',
                'message' => "Wystąpił błąd podczas dodawnia zdjęcia do galerii"
            ];
        }

        return redirect()
            ->route('admin.photos.create')
            ->with($message['status'], $message['message']);
    }

    public function destroy(int $id): RedirectResponse
    {
        Gate::authorize('moderator-level');

        $path = 'public/' . $this->galleryRepository->getPhoto($id, ['path'])->path;

        if (Storage::delete($path)) {
            $this->galleryRepository->deletePhoto($id);

            Cache::forget('user-gallery');

            $message = [
                'status' => 'success',
                'message' => 'Poprawnie usunięto zdjęcie z galerii'
            ];
        } else {
            $message = [
                'status' => 'error',
                'message' => 'Wystąpił błąd podczas usuwania zdjęcia'
            ];
        }
        return redirect()
            ->route('admin.photos.create')
            ->with($message['status'], $message['message']);
    }
}

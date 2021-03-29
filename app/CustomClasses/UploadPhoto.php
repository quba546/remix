<?php

declare(strict_types=1);

namespace App\CustomClasses;


use App\Models\TemporaryFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadPhoto
{
    const TEMPORARY_PATH = 'public/tmp/';

    public function saveTemporaryUploadedImage(UploadedFile $uploadedFile): string
    {
        $file = $uploadedFile;
        $folder = uniqid() . '-' . now()->timestamp;
        $filename = Storage::putFile(self::TEMPORARY_PATH . $folder, $file); // add image to storage
        $filename = str_replace(self::TEMPORARY_PATH . $folder . '/', '', $filename);

        TemporaryFile::create([
            'folder' => $folder,
            'filename' => $filename
        ]);

        return $folder;
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function savePlayerImage(string $playerImage, ?string $oldImagePath): ?string
    {
        // delete garbage form request
        $folder = substr($playerImage, 0, strpos($playerImage, '<'));
        $temporaryFile = TemporaryFile::where('folder', '=', $folder)->first();

        if ($temporaryFile) {
            Storage::move(
                'public/tmp/' . $folder . '/' . $temporaryFile->filename,
                'public/players-images/' . $temporaryFile->filename
            );
            Storage::deleteDirectory('public/tmp/' . $folder);
            $temporaryFile->delete();

            if (isset($oldImagePath)) {
                $oldPlayerImagePath = $oldImagePath;
                $oldPlayerImage = str_replace('players-images/', '', $oldPlayerImagePath);
                // delete old player image from storage
                Storage::delete('public/players-images/' . $oldPlayerImage);
            }
        }

        return $temporaryFile->filename ?? null;
    }

    /** @noinspection PhpUnhandledExceptionInspection */
    public function savePhotoToGallery(string $uploadedPhotoFilename): ?string
    {
        // delete garbage form request
        $folder = substr($uploadedPhotoFilename, 0, strpos($uploadedPhotoFilename, '<'));
        $temporaryFile = TemporaryFile::where('folder', '=', $folder)->first();

        if ($temporaryFile) {
            Storage::move(
                'public/tmp/' . $folder . '/' . $temporaryFile->filename,
                'public/photos/' . $temporaryFile->filename
            );
            Storage::deleteDirectory('public/tmp/' . $folder);
            $temporaryFile->delete();
        }

        return $temporaryFile->filename ?? null;
    }
}

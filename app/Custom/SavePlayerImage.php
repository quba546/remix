<?php

declare(strict_types=1);

namespace App\Custom;


use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;

class SavePlayerImage
{
    public function saveImage(string $playerImage, ?string $oldImagePath): ?string
    {
        $folder = substr($playerImage, 0, strpos($playerImage, '<')); // delete garbage form request
        $temporaryFile = TemporaryFile::where('folder', '=', $folder)->first();

        if ($temporaryFile) {
            Storage::move('public/tmp/' . $folder . '/' . $temporaryFile->filename, 'public/players-images/' . $temporaryFile->filename);
            Storage::deleteDirectory('public/tmp/' . $folder);
            $temporaryFile->delete();

            if (isset($oldImagePath)) {
                $oldPlayerImagePath = $oldImagePath;
                $oldPlayerImage = str_replace('players-images/', '', $oldPlayerImagePath);
                Storage::delete('public/players-images/' . $oldPlayerImage); // delete old player image from storage
            }
        }

        return $temporaryFile->filename ?? null;
    }
}

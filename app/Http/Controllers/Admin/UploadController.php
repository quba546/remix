<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    const TEMPORARY_PATH = 'public/tmp/';

    public function store(Request $request) : string
    {
        if ($request->hasFile('playerImage')) {
            $file = $request->file('playerImage');
            $folder = uniqid() . '-' . now()->timestamp;
            $filename = Storage::putFile(self::TEMPORARY_PATH . $folder, $file); // add new player image to storage
            $filename = str_replace(self::TEMPORARY_PATH . $folder . '/', '', $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            return $folder;
        } else {

            return '';
        }
    }
}

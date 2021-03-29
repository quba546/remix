<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\UploadPlayerImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UploadController extends Controller
{
    public function store(Request $request): string
    {
        Gate::authorize('moderator-level');

        if ($request->hasFile('playerImage')) {
            $saveTemporaryFile = new UploadPlayerImage();

            return $saveTemporaryFile->saveTemporaryUploadedImage($request->file('playerImage'));
        }

        return '';
    }
}

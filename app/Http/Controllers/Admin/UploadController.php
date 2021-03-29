<?php

namespace App\Http\Controllers\Admin;

use App\CustomClasses\UploadPhoto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UploadController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function store(Request $request): string
    {
        Gate::authorize('moderator-level');

        if ($request->hasFile('uploadedPhoto')) {
            $saveTemporaryFile = new UploadPhoto();

            return $saveTemporaryFile->saveTemporaryUploadedImage($request->file('uploadedPhoto'));
        }

        return '';
    }
}

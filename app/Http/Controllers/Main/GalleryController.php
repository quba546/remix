<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function __invoke()
    {
        return view('user.gallery');
    }
}

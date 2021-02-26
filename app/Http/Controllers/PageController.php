<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __invoke(string $page): View
    {
        return view('user.' . $page);
    }
}

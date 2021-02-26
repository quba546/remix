<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __invoke(string $page): View
    {
        $title = match ($page) {
            'about' => 'O nas',
            'contact' => 'Kontakt',
            'privacy-policy' => 'Polityka prywatności',
            default => 'Remix Niebieszczany',
        };

        SEOMeta::setTitle($title);

        return view('user.' . $page);
    }
}

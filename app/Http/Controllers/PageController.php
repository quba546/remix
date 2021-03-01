<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\View\View;

class PageController extends Controller
{
    public function __invoke(string $page): View
    {
        switch($page) {
            case 'about':
                $title = 'O nas';
                break;
            case 'contact':
                $title = 'Kontakt';
                break;
            case 'privacy-policy':
                $title = 'Polityka prywatności';
                break;
            default:
                $title = 'Remix Niebieszczany';
                break;
        }

        SEOMeta::setTitle($title);

        return view('user.' . $page);
    }
}

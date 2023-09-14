<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $images = Image::query()
            ->with('author')
            ->orderByDesc('id')
            ->paginate(24);

        return view('home', compact('images'));
    }
}

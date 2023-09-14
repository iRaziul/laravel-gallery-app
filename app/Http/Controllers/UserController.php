<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $images = auth()
            ->user()
            ->images()
            ->withTrashed()
            ->paginate(20);

        return view('dashboard', compact('images'));
    }

    public function show(User $user): View
    {
        $images = $user->images()->paginate(20);    // using the relationship

        return view('users.show', compact('user', 'images'));
    }
}

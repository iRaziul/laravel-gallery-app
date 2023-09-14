<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function create(): View
    {
        return view('image.create');
    }

    public function store(StoreImageRequest $request)
    {
        $data = $request->validated();
        $data['image_path'] = $request->file('image')->store('images', 'public');

        // $data['author_id'] = auth()->id();
        // Image::create($data);

        auth()->user()->images()->create($data);    // Same as above (auto assigns author_id)

        return back()->with('success', __('Image uploaded'));
    }

    public function show(Image $image): View
    {
        return view('image.show', compact('image')); // ['image' => $image]
    }

    public function edit(Image $image): View
    {
        return view('image.edit', compact('image'));
    }

    public function update(UpdateImageRequest $request, Image $image): RedirectResponse
    {
        $data = $request->validated();

        if ($request->file('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');

            // delete previous image
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
        }

        $image->update($data);

        return back()->with('success', __('Image updated'));
    }

    public function destroy(Image $image): RedirectResponse
    {
        abort_unless($image->isEditable(), 403);

        $image->delete();

        return back()->with('success', __('Image deleted'));
    }

    public function restore(Image $image): RedirectResponse
    {
        abort_unless($image->isEditable(), 403);

        $image->restore();

        return back()->with('success', __('Image restored'));
    }
}

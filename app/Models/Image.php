<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    // protected $fillable = ['title', 'description', 'image_path'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Full URL of the image
     */
    public function url(): string
    {
        return Storage::url($this->image_path);
    }

    /**
     * Link of the image page
     */
    public function link(): string
    {
        return route('image.show', $this);
    }

    public function isEditable(): bool
    {
        if (auth()->guest()) {
            return false;
        }

        return (auth()->id() === $this->author_id)
            || auth()->user()->is_admin;
    }
}

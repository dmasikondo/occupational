<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class File extends Model
{
    protected $guarded = [];
    use HasFactory;
    /**
     * polymophic commenting and image upload relationship (to optionally include text body and files)
     */
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the title capitalised first letter words.
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }

}

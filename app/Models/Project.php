<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'start_date',
        'end_date',
        'project_image',
        'created_by',
        'is_complete',
        'street',
        'suburb',
        'city',
    ];



    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }

    public function files()
     {
      return $this->morphMany(File::class, 'fileable');
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
    /**
     * Get the street address first letter words capitalised.
     */
    protected function street(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }

    /**
     * Get the suburb address first letter words capitalised.
     */
    protected function suburb(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucwords($value),
        );
    }
}

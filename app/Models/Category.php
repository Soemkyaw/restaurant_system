<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($category) {
        if ($category->isDirty('name')) {
            $category->slug = Str::slug($category->name);
        }
    });
    }
}

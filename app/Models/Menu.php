<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        static::saving(function ($menu) {
        if ($menu->isDirty('name')) {
            $menu->slug = Str::slug($menu->name);
        }
    });
    }
}

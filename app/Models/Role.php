<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($role) {
        if ($role->isDirty('name')) {
            $role->slug = Str::slug($role->name);
        }
    });
    }
}

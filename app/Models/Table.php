<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['name','seat'];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($table) {
        if ($table->isDirty('name')) {
            $table->slug = Str::slug($table->name);
        }
    });
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','category_id','is_available','image','preparation_time','spicy_level','discpunt'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter($query,$filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        });

        $query->when($filter['category'] ?? false, function ($query, $category) {
            $query->whereHas('category',function($query) use($category){
                $query->where('slug', 'like', '%' . $category . '%');
            });
        });
    }

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

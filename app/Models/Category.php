<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'keywords',
        'description',
        'image',
        'parent_id',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function mainCategories()
    {
        return Category::where('parent_id', 0)->where('status', 1)->get();
    }

    public static function getParentsTree($category, $title)
    {
        if ($category->parent_id == 0) {
            return $title;
        }

        $parent = Category::find($category->parent_id);

        if ($parent) {
            $title = $parent->title . ' > ' . $title;
            return self::getParentsTree($parent, $title);
        }

        return $title;
    }
}

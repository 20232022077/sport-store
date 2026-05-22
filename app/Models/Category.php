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

    // A category has many child categories (subcategories)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // A category belongs to a parent category
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}

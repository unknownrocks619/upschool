<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Menu extends Model
{
    use HasFactory, HasRecursiveRelationships, SoftDeletes;

    protected $casts = [
        "menu_featured_image" => "object"
    ];

    public function getParentKeyName()
    {
        return "parent_id";
    }

    public function categories()
    {
        return $this->morphedByMany(Category::class, "menuable");
    }

    public function courses()
    {
        return $this->morphedByMany(Course::class, "menuable");
    }

    public function lessions()
    {
    }

    public function blogs()
    {
    }

    public function pages()
    {
        return $this->morphedByMany(Page::class, "menuable");
    }

    public function charities()
    {
        return $this->morphedByMany(OrganisationProject::class, "menuable");
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, "menuable");
    }
}

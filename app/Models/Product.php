<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "images" => "object",
        "meta" => "object",
        "shipping" => "object",
        "featured_image" => "object"
    ];

    public function author()
    {
        return $this->belongsTo(User::class, "author_id");
    }

    public function projects()
    {
        return $this->belongsTo(OrganisationProject::class, "project_id");
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, "categoryables");
    }
}

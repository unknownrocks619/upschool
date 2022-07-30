<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Widget extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "fields" => "object",
        "settings" => "object",
        "layouts" => "object"
    ];

    public function pages()
    {
        return $this->morphedByMany(Page::class, 'widgetable');
    }

    public function courses()
    {
        return $this->morphedByMany(Course::class, "widgetable");
    }

    public function lession()
    {
        return $this->morphedByMany(Lession::class, "widgetable");
    }
}

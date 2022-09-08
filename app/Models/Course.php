<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        "course_access" => 'object',
        "images" => "object",
        "videos" => "object",
        "file_resource" => "object"
    ];


    public function chapters()
    {
        return $this->belongsToMany(Chapter::class, 'chapter_course')->as("course_pivot");
    }

    public function widget()
    {
        return $this->morphToMany(Widget::class, "widgetable");
    }
}

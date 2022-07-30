<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;


    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function lession()
    {
        return $this->hasMany(Lession::class, "chapter_id");
    }
}

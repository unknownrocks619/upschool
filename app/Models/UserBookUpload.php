<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserBookUpload extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "book" => "object",
        "categories" => "array"
    ];

    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function project()
    {
        return $this->belongsTo(OrganisationProject::class, "project_id");
    }
}

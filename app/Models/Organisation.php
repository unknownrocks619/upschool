<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisation extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "website" => "object",
        "featured_image" => "object",
        "featured_videos" => "object",
        "logo" => "object",
        "images" => "object",
        "videos" => "object"
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'organisation_students', "organisation_id", "user_id")->as("organisation_student");
    }
    public function projects()
    {
        return $this->hasMany(OrganisationProject::class, "organisations_id");
    }
}

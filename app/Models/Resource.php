<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "links" => "object",
        "image" => "object",
        "video" => "object",
        "downloadable_content" => "object"
    ];

    public function lession()
    {
        return $this->belongsTo(Lession::class, "source_id")->where('source', 'lession');
    }
}

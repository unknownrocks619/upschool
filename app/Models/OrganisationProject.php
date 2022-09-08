<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganisationProject extends Model
{
    use HasFactory;

    protected $casts = [
        "images" => "object",
        "videos" => "object"
    ];

    public function organisation()
    {
        return $this->belongsTo(Organisation::class, "organisations_id");
    }
}

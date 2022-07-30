<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lession extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        "video" => "object"
    ];

    public function widget()
    {
        return $this->morphToMany(Widget::class, "widgetable");
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'source_id')->where('source', "lession");
    }
}

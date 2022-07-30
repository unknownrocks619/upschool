<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $dates = [
        "created_at",
        "updated_at",
        "deleted_at"
    ];

    public function widget()
    {
        return $this->morphToMany(Widget::class, "widgetable");
    }
}

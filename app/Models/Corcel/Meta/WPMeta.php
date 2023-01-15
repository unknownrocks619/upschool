<?php

namespace App\Models\Corcel\Meta;

use Corcel\Model as CorcelModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WPMeta extends CorcelModel
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey  = 'meta_id';
    protected $connection = "wp_compactibility";
    protected $table = "postmeta";
}

<?php

namespace App\Models\Corcel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Corcel\Model\User as CorcelUserModel;

class WpUser extends CorcelUserModel
{
    use HasFactory;
}

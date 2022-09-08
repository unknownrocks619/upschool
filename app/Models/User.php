<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        "date_of_birth" => "encrypted",
        "avatar" => "object",
    ];

    public function verify_email()
    {
        return $this->hasOne(EmailVerify::class);
    }

    public function user_role()
    {
        return $this->hasOne(Role::class, "id", "role");
    }

    public function organisations()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_students')->where("organisation_students.active", true);
    }
    public function organisation_student()
    {
        return $this->hasOne(OrganisationStudent::class, 'user_id');
    }

    public function full_name()
    {
        $full_name = $this->first_name;

        if ($this->middle_name) {
            $full_name .= " " . $this->middel_name;
        }
        $full_name .= " " . $this->last_name;

        return $full_name;
    }

    public function reset_password()
    {
        return $this->hasOne(ResetPassword::class, "user_id");
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, "course_students")->where('course_students.active', true);
    }
}

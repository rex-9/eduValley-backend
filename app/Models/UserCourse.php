<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    use HasFactory;

    protected $table = "user_course";

    protected $fillable = ["user_id", "course_id", "day","month", "year", "paid"];

    public $timestamps = false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'grade',
        'subject',
        'image',
        'token',
        'zip',
        'price',
        'students',
        'teacher_id',
        'genre',
        'ongoing',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }

    public function freevideos()
    {
        return $this->hasMany(Freevideo::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'fileName',
        'thumbName',
        'parent',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

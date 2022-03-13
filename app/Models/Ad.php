<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'serial',
        'name',
        'site',
        'expire',
        'category',
    ];

    public function minivideos()
    {
        return $this->hasMany(Minivideos::class);
    }

    public function posters()
    {
        return $this->hasMany(Poster::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function stars()
    {
        return $this->hasMany(Star::class);
    }
}

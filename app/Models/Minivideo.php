<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minivideo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ad_id',
        'title',
        'fileName',
        'thumbName',
        'parent',
    ];

    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}

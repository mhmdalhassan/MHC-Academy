<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTrack extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'introduction',
        'cards',
    ];

    protected $casts = [
        'cards' => 'array', // Each element: ['image' => '', 'name' => '', 'image_icon' => '', 'description' => '']
    ];
}

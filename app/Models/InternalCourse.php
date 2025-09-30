<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InternalCourse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'header',
        'description',
        'students_enrolled',
        'expert_instructors',
        'projects_built',
        'completion_rate',
    ];
}

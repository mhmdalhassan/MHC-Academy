<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'detail',
        'image',
        'price',
        'category',
        'duration',
        'difficulty',
        'lessons',
        'rating',
        'enrolled_count',
        'welcome_video_url',
        'overview_video_url',
        'core_concepts',
        'instructor_id',
        'student_review_ids', // ✅ add here
    ];


    protected $casts = [
        'core_concepts' => 'array',
        'student_review_ids' => 'array', // ✅ cast JSON to array
    ];

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function studentReviews()
    {
        return $this->hasMany(StudentReview::class, 'product_id');
    }



}

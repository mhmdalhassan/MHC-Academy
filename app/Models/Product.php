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
    ];


    protected $casts = [
        'core_concepts' => 'array',
    ];


    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

}

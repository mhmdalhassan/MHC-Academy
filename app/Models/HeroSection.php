<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeroSection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'header',
        'introduction',
        'button1_name',
        'button1_route',
        'button2_name',
        'button2_route',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Footer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'footer'; // Specify table name explicitly

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone_number',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'github',
        'privacy_policy',
        'terms_of_service',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeStatistic extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'introduction', 'cards'];

    protected $casts = [
        'cards' => 'array', // This lets Laravel automatically convert JSON <-> array
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'rate',
        'title',
        'details',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

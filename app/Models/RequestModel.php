<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = 'requests'; // make sure your table is named 'requests'

    protected $fillable = [
        'fullname',
        'email',
        'phone',
        'subject',
        'message',
    ];
}

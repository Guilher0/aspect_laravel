<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Approval extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'student_name',
        'course',
        'image_base64',
        'author_image_base64',
        'approval_date',
        'description',
    ];
}

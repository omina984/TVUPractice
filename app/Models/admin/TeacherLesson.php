<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class TeacherLesson extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'description',
        'state'
    ];
}

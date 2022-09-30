<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class StudentTeacherLesson extends Model
{
    protected $fillable = [
        'student_id',
        'lesson_id',
        'description',
        'state'
    ];
}

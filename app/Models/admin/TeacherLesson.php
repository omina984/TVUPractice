<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class TeacherLesson extends Model
{
    protected $table = 'teacherlessons';

    protected $fillable = [
        'teacher_id',
        'lesson_id',
        'description',
        'state'
    ];
}
<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = ['name', 'lessongroups_id', 'lessongroup_code', 'lessoncode', 'vahed', 'vahed_teory', 'vahed_amali', 'term_id','description', 'state'];
}

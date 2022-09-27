<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'lessongroups_id', 'lessongroup_code', 'lessoncode', 'vahed', 'vahed_teory', 'vahed_amali', 'state'];
}

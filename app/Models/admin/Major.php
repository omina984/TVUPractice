<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['name', 'lessongroup_id', 'description', 'state'];
}

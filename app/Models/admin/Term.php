<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = ['name', 'description', 'state'];
}
